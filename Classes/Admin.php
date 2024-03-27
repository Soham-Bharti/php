<?php
final class Admin extends dbConnection
{
    private $conn;

    public function __construct()
    {
        $this->conn = parent::connect();
    }

    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function showEmployees()
    {
        $sql = "SELECT id, profile_url, name, email, gender, mobile, date_of_birth from users where role = 'employee' and deleted_at is null order by id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function isEmployeeProfessionalInfoAdded($userId)
    {
        $sql2 = "SELECT * FROM employeeDetails WHERE user_id = $userId AND deleted_at IS NULL;";
        $result = mysqli_query($this->conn, $sql2);
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    public function addEmployee($role, $name, $email, $hashedPassword, $gender, $mobile, $dob, $address, $city, $state, $fileNameNew)
    {
        $sql = "INSERT INTO users(role, name, email, password, gender, mobile, date_of_birth, address, city, state, profile_url)
        values('$role', '$name','$email', '$hashedPassword', '$gender', '$mobile', '$dob', '$address', '$city', '$state', '$fileNameNew')";
        if (mysqli_query($this->conn, $sql)) {
            mysqli_close($this->conn);
            return true;
        }
        mysqli_close($this->conn);
        return false;
    }

    public function showEmployeeAllDetails($desiredUserId)
    {
        $sql = "SELECT 
        COALESCE(SUM(TIMESTAMPDIFF(SECOND, e.check_in_time, e.check_out_time)), 0) AS total_seconds,
        u.id,
        u.name, 
        u.mobile, 
        u.date_of_birth, 
        u.gender, 
        u.city, 
        u.state, 
        u.address,
        u.email,
        u.profile_url,
        u.created_at,
        ed.salary, 
        ed.technology_assigned, 
        ed.joining_date, 
        ed.bond_period, 
        ed.notice_period 
    FROM 
        users u
    LEFT JOIN
        employeeTrackingDetails e ON u.id = e.user_id AND MONTH(e.check_in_time) = MONTH(CURDATE()) AND YEAR(e.check_in_time) = YEAR(CURDATE())
    LEFT JOIN 
        employeeDetails ed ON u.id = ed.user_id
    WHERE 
        u.id = '$desiredUserId' 
        AND u.deleted_at IS NULL
    GROUP BY 
        u.id, ed.user_id
    ORDER BY u.created_at;
    ";

        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function isEmployeeAllDetailsAvalable($desiredUserId)
    {
        $sql = "SELECT * from employeeDetails where user_id = '$desiredUserId' and deleted_at is null;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function daysInCurrentMonth()
    {
        $sql = "SELECT DAY(LAST_DAY(NOW())) AS days_in_current_month;";
        $result = mysqli_query($this->conn, $sql);
        mysqli_close($this->conn);
        return $result;
    }

    public function updateEmployeeBasicDetails($name, $email, $mobile, $address, $gender, $dob, $city, $state, $fileNameNew, $id)
    {
        $sql = "UPDATE users
            SET name = '$name',  email='$email', mobile='$mobile' , address= '$address', gender = '$gender', date_of_birth = '$dob', city = '$city', state = '$state', profile_url = '$fileNameNew', updated_at = now()
            where id = '$id'
            ";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function addEmployeeProfessionalDetails($desiredUserId, $salary, $tech, $joiningDate, $noticePeriod, $bondPeriod)
    {
        $sql = "INSERT into employeeDetails (user_id, salary, technology_assigned, joining_date, bond_period, notice_period) values ('$desiredUserId', '$salary', '$tech', '$joiningDate', '$bondPeriod', '$noticePeriod');";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function updateEmployeeProfessionalDetails($desiredUserId, $salary, $tech, $joiningDate, $noticePeriod, $bondPeriod)
    {
        $sql = "UPDATE employeeDetails set salary = '$salary', technology_assigned = '$tech', joining_date =  '$joiningDate', bond_period = '$bondPeriod', notice_period = '$noticePeriod', updated_at = now() where user_id = '$desiredUserId' and deleted_at is null;";

        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function showEmployeePMSdetails($desiredUserId)
    {
        $sql = "SELECT updt.project_id as projectId, updt.activity_log as summary, updt.created_at as created_dateTime, p.title as projectTitle
                from UserProjectDailyTask updt
                inner join projects p
                on p.id = updt.project_id
                where user_id = $desiredUserId and p.deleted_at is null order by created_dateTime desc limit 10";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function showEmployeeTrackDetailsWithGroupByDate($desiredUserId)
    {
        $sql =  "SELECT
            id,
            check_in_time,
            check_out_time,
            DATE(check_in_time) AS date,
            SUM(TIMESTAMPDIFF(SECOND, check_in_time, check_out_time)) AS total_seconds
            FROM employeeTrackingDetails
            WHERE user_id = '$desiredUserId' and deleted_at is null
            GROUP BY DATE(check_in_time)
            ORDER BY DATE(check_in_time) DESC;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function showEmployeeTrackDetailsWithGroupByCheckInTime($desiredUserId)
    {
        $sql =  "SELECT
            id,
            check_in_time,
            check_out_time,
            DATE(check_in_time) AS date,
            SUM(TIMESTAMPDIFF(SECOND, check_in_time, check_out_time)) AS total_seconds
            FROM employeeTrackingDetails
            WHERE user_id = '$desiredUserId' and deleted_at is null
            GROUP BY check_in_time
            ORDER BY check_in_time DESC;";

        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function showEmployeeTrackDetailsUsingTrackId($desiredUserId, $desiredTrackId)
    {
        $sql = "SELECT check_in_time, check_out_time from employeeTrackingDetails where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function addEmployeeTrackDetails($desiredUserId, $date, $checkInTime, $checkOutTime)
    {
        if (!isset($checkOutTime)) $sql = "INSERT INTO employeeTrackingDetails(user_id, check_in_time) values('$desiredUserId', '$date $checkInTime')";
        else $sql = "INSERT INTO employeeTrackingDetails(user_id, check_in_time, check_out_time) values('$desiredUserId', '$date $checkInTime', '$date $checkOutTime')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function employeeTrackDetailsOnDate($desiredUserId, $date)
    {
        $sql = "SELECT check_in_time, check_out_time
        from employeetrackingdetails
        where user_id = '$desiredUserId' and deleted_at is null and DATE(check_in_time) = '$date';";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function employeeTrackCheckInCounts($desiredUserId, $date)
    {
        $sql = "SELECT count(date(check_in_time)) as count from employeeTrackingDetails where user_id = '$desiredUserId' and date(check_in_time) = '$date' and deleted_at is null;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function updateEmployeeTrackDetails($desiredUserId, $desiredTrackId, $date, $checkInTime, $checkOutTime)
    {
        if (isset($checkOutTime)) {
            $sql = "UPDATE employeeTrackingDetails set check_in_time = '$date $checkInTime', check_out_time = '$date $checkOutTime', updated_at = now() where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
        } else {
            $sql = "UPDATE employeeTrackingDetails set check_in_time = '$date $checkInTime', check_out_time = null, updated_at = now() where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
        }
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deleteEmployeeTrackDetails($desiredUserId, $desiredTrackId)
    {
        $sql = "UPDATE employeeTrackingDetails set deleted_at = now() where user_id = '$desiredUserId' and id ='$desiredTrackId';";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function deleteEmployee($desiredUserId)
    {
        $sql  = "UPDATE users SET deleted_at = now() WHERE id = '$desiredUserId';";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function totalEmployeesCount()
    {
        $sql = "SELECT count(id) as totalEmployeesCount from users where deleted_at is null and role = 'employee'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function totalCheckedInUsersToday()
    {
        $sql = "SELECT DISTINCT u.name , u.id
        FROM users u 
        INNER JOIN employeetrackingdetails e ON e.user_id = u.id
        WHERE e.deleted_at IS NULL AND DATE(e.check_in_time) = DATE(NOW());";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function totalEmployeesWithNoProjects()
    {
        $sql = "SELECT DISTINCT u.id, u.name
        FROM users u
        left JOIN employeesprojects ep ON u.id = ep.user_id
        where u.deleted_at is null and ep.deleted_at is null and role = 'employee' and ep.id is null";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
