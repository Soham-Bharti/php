-- The DROP TRIGGER statement deletes a trigger from the database.

-- Here is the basic syntax of the DROP TRIGGER statement:

-- DROP TRIGGER [IF EXISTS] [schema_name.]trigger_name;

show triggers;
--  END	BEFORE	2024-03-08 14:25:49.95	ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION


drop trigger update_items_modify_time;
-- done

show triggers;
-- (empty)
