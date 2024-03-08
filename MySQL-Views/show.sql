-- MySQL Show View – Using SHOW FULL TABLES statement
-- MySQL treats the views as tables with the type 'VIEW'. Therefore, you can use the SHOW FULL TABLES statement to display all views in the current database as follows:

-- SHOW FULL TABLES 
-- WHERE table_type = 'VIEW';

-- Because the SHOW FULL TABLES statement returns both tables and views, we need to add a WHERE clause to obtain views only.

-- If you want to show all views in a specific database, you can use the FROM or IN clause in the SHOW FULL TABLES statement:

-- SHOW FULL TABLES
-- [{FROM | IN } database_name]
-- WHERE table_type = 'VIEW';

SHOW FULL TABLES IN sys 
WHERE table_type='VIEW';
-- host_summary	VIEW
-- host_summary_by_file_io	VIEW
-- host_summary_by_file_io_type	VIEW
-- host_summary_by_stages	VIEW
-- host_summary_by_statement_latency	VIEW
-- host_summary_by_statement_type	VIEW
-- innodb_buffer_stats_by_schema	VIEW
-- innodb_buffer_stats_by_table	VIEW
-- innodb_lock_waits	VIEW
-- io_by_thread_by_latency	VIEW
-- io_global_by_file_by_bytes	VIEW
-- io_global_by_file_by_latency	VIEW
-- ...

SHOW FULL TABLES 
FROM sys
LIKE 'waits%';
-- waits_by_host_by_latency	VIEW
-- waits_by_user_by_latency	VIEW
-- waits_global_by_latency	VIEW