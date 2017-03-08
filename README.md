# MobilDev small Assessment
@author Emre KAHRAMAN

----------------------------- DB -------------------------------

CREATE TABLE  `books` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`book_name` VARCHAR( 100 ) NOT NULL ,
`author_name` VARCHAR( 50 ) NOT NULL ,
`isbn` VARCHAR( 50 ) NOT NULL
) ENGINE = MYISAM ;
-----------------------------END DB------------------------------
Note: charsets are all utf8_turkish_ci
