#########################################################
# This is my scripts for cs313 - BYUI - Postgresql.
# This is essentially my repo's that I will use to wok on
# my database that is tied to my PHP website. 
# The examples are template statements to provide a toolbox
# for the necessary sql statement in this project.
#########################################################

-- This create the database
CREATE DATABASE database_name;

-- Connect to the database
\c database_name

-- Create the schema
CREATE SCHEMA SYS_DOC;

-- Change the definition of the schema
ALTER SCHEMA SYS_DOC OWNER TO owner_name;

-- Attach a comment to the table
COMMENT ON TABLE database_table IS 'This is a table that I have.';

-- Remove the comment
COMMENT ON TABLE database_table IS NULL;

-- Create a sequence number generator
-- CREATE SEQUENCE database_id_sequence
-- 	START WITH 1
-- 	increment BY 1
-- 	NO MINVALUE
-- 	NO MAXVALUE
-- 	CACHE 2;

# A few helpful commands you might want during the process:
# \dt - Lists the tables
# \d+ public.user - Shows the details of the user table
# DROP TABLE public.user - Removes the user table completely so we can re-create it
# \q - Quit the application and go back to the regular command prompt

-- Here is an example of how a table is created.
-- CREATE TABLE public.user
-- (
-- 	id SERIAL NOT NULL PRIMARY KEY,
-- 	username VARCHAR(100) NOT NULL UNIQUE,
-- 	password VARCHAR(100) NOT NULL,
-- 	display_name VARCHAR(100) NOT NULL
-- );

# Notice that we used "serial" for the datatype of the user table, which
# makes it an integer that will automatically increment the value of each
# item that is inserted.

-- Below will be an example to utilize various sql stuff.
-- DROP TABLE IF EXISTS 'database_name';

-- CREATE TABLE 'database_table' (
-- 	'data_id' 	SERIAL NOT NULL,
-- 	'name'			VARCHAR(45),
-- 	PRIMARY KEY ('database_id')
-- );

-- INSERT INTO 'database_table' VALUES	(1, 'burgers'),(2, 'notepad');


