CREATE TABLE public.user
(
	id SERIAL NOT NULL PRIMARY KEY,
	Email VARCHAR(50) NOT NULL UNIQUE,
	Password VARCHAR(255) NOT NULL
);
