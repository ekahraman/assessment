# MobilDev small Assessment
@author Emre KAHRAMAN
<br/>
----------------------------- DB -------------------------------<br/>

CREATE TABLE  `books` (<br/>
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,<br/>
`book_name` VARCHAR( 100 ) NOT NULL ,<br/>
`author_name` VARCHAR( 50 ) NOT NULL ,<br/>
`isbn` VARCHAR( 50 ) NOT NULL<br/>
) ENGINE = MYISAM ;<br/>
-----------------------------END DB------------------------------<br/><br/>
Notes:<br/><br/>
1 - charsets are all utf8_turkish_ci<br/>
2 - for cache file to be created you need to set chmod both read and write
