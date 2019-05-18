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

-- Create an item table
CREATE TABLE 'item' (
	item_id          SERIAL              NOT NULL,
	item_code        VARCHAR(50)         NOT NULL,
	item_name        VARCHAR(45)  UNIQUE NOT NULL,
	item_description VARCHAR(100)        NOT NULL,
	item_price       INT                 NOT NULL,
	item_inv         INT                 NOT NULL
);

-- Create the customer table
CREATE TABLE 'customer' (
	customer_id    SERIAL             NOT NULL,
	customer_name  VARCHAR(45) UNIQUE NOT NULL,
	customer_email VARCHAR(45) UNIQUE NOT NULL
);

-- Create the order table
CREATE TABLE 'orders' (
	order_id    SERIAL         NOT NULL,
	product_id  INT    UNIQUE  NOT NULL,
	customer_id INT    UNIQUE  NOT NULL,
	order_data  DATE   UNIQUE  NOT NULL,

);

-- Create the completed orders table, this shows a record of all previous transactions.
CREATE TABLE 'completed_orders' (
	comp_orders_id SERIAL        NOT NULL,
	total          INT 		     NOT NULL,
	tax_rate       INT 		     NOT NULL,
	customer_id    INT    UNIQUE NOT NULL,
	order_id       INT    UNIQUE NOT NULL 

);

-- Create the Cart table
CREATE TABLE 'session' (
	session_id    SERIAL             NOT NULL,
	customer_id   INT         UNIQUE NOT NULL,
	customer_name VARCHAR(50)        NOT NULL

);

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


