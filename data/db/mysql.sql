CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL,
    UNIQUE (
       name
    )
);
CREATE TABLE config (
    name VARCHAR(50) NOT NULL ,
    value VARCHAR(200) NOT NULL ,
    PRIMARY KEY ( name )
);
CREATE TABLE pages (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    author INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    content LONGTEXT NOT NULL,
    UNIQUE (
        name
    ),
    INDEX author (
        author
    )
);
CREATE TABLE context (
    context_id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    host varchar(255) NOT NULL,
    path varchar(255) DEFAULT NULL,
    PRIMARY KEY (context_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
