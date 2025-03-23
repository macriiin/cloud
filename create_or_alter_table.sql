-- If the table does not exist, create it
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    hash_password VARCHAR(255) NOT NULL,
    otp VARCHAR(6),
    is_verified TINYINT(1) DEFAULT 0
);

-- If the table already exists, alter it to add the new columns
ALTER TABLE users
    ADD COLUMN IF NOT EXISTS first_name VARCHAR(50) NOT NULL,
    ADD COLUMN IF NOT EXISTS middle_name VARCHAR(50),
    ADD COLUMN IF NOT EXISTS last_name VARCHAR(50) NOT NULL,
    ADD COLUMN IF NOT EXISTS email VARCHAR(100) NOT NULL UNIQUE,
    ADD COLUMN IF NOT EXISTS hash_password VARCHAR(255) NOT NULL,
    ADD COLUMN IF NOT EXISTS otp VARCHAR(6),
    ADD COLUMN IF NOT EXISTS is_verified TINYINT(1) DEFAULT 0;
