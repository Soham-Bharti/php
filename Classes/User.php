<?php
require '../../config/dbConnection.php';

final class User
{
    private $conn;
    private $desiredUserId;

    public function __construct($userId)
    {
        $dbObj = new dbConnection();
        $this->conn = $dbObj->connect();
        $this->desiredUserId = $userId;
    }

    public function showDetails()
    {
        $sql = "SELECT 
    COALESCE(SUM(TIMESTAMPDIFF(SECOND, e.check_in_time, e.check_out_time)), 0) AS total_seconds,
    u.name, 
    u.mobile, 
    u.date_of_birth, 
    u.gender, 
    u.city, 
    u.state, 
    u.email, 
    u.profile_url,
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
    u.id = '$this->desiredUserId' 
    AND u.deleted_at IS NULL
GROUP BY 
    u.id, ed.user_id;
";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function checkInCounts()
    {
        $sql = "SELECT count(date(check_in_time)) as count from employeeTrackingDetails where user_id = '$this->desiredUserId' and date(check_in_time) = date(now()) and deleted_at is null;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function checkIn()
    {
        $sql = "INSERT into employeeTrackingDetails(user_id, check_in_time) values ('$this->desiredUserId',now())";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function isCheckedIn()
    {
        $sql = "SELECT date(check_in_time) as date from employeeTrackingDetails where user_id = '$this->desiredUserId' and deleted_at is null order by check_in_time desc limit 1;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function checkOut()
    {
        $sql = "UPDATE employeeTrackingDetails set check_out_time = now(), updated_at = now() where user_id = '$this->desiredUserId' order by check_in_time desc limit 1";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function showEmployeeCheckOutTime()
    {
        $sql = "SELECT check_out_time from employeeTrackingDetails where user_id = '$this->desiredUserId' order by check_in_time desc limit 1";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function showTrackDetails($withDateGroupBy)
    {
        if ($withDateGroupBy) {
            $sql =  "SELECT
            id,
            check_in_time,
            check_out_time,
            DATE(check_in_time) AS date,
            SUM(TIMESTAMPDIFF(SECOND, check_in_time, check_out_time)) AS total_seconds
            FROM employeeTrackingDetails
            WHERE user_id = '$this->desiredUserId' and deleted_at is null
            GROUP BY DATE(check_in_time)
            ORDER BY DATE(check_in_time) DESC;";
        } else
            $sql =  "SELECT
            id,
            check_in_time,
            check_out_time,
            DATE(check_in_time) AS date,
            SUM(TIMESTAMPDIFF(SECOND, check_in_time, check_out_time)) AS total_seconds
            FROM employeeTrackingDetails
            WHERE user_id = '$this->desiredUserId' and deleted_at is null
            GROUP BY check_in_time
            ORDER BY check_in_time DESC;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function getCurrentPassword()
    {
        $sql = "SELECT password from users where id = '$this->desiredUserId' and deleted_at is null";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function changePassword($newHashedPassword)
    {
        $sql = "UPDATE users set password = '$newHashedPassword', updated_at = now() where id = '$this->desiredUserId'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function daysInCurrentMonth()
    {
        $sql = "SELECT DAY(LAST_DAY(NOW())) AS days_in_current_month;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function showPMS()
    {
        $sql = "SELECT updt.project_id as projectId, updt.activity_log as summary, updt.created_at as created_dateTime, p.title as projectTitle
        from UserProjectDailyTask updt
        inner join projects p
        on p.id = updt.project_id
        where user_id = $this->desiredUserId and p.deleted_at is null order by created_dateTime desc limit 10";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function showProjects()
    {
        $sql = "SELECT p.id as id, p.title as title, p.description as description, ep.created_at as assigned_on
        from projects as p
        inner join employeesProjects as ep
        on p.id = ep.project_id
        where ep.deleted_at is null and p.deleted_at is null and ep.user_id = '$this->desiredUserId'
        order by assigned_on desc;";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function addProjectDailyTask($projectId, $description)
    {
        $sql = "INSERT INTO UserProjectDailyTask(user_id, project_id, activity_log) values('$this->desiredUserId', '$projectId', '$description');";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
