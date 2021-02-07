CREATE TABLE `boss`.`bookings` ( `id` INT NOT NULL , `dateIn` DATE NOT NULL , `dateOut` DATE NOT NULL , `name` VARCHAR(20) NOT NULL , `room` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;
--set autoincrement id enabled


INSERT INTO `bookings` (`id`, `dateIn`, `dateOut`, `name`, `room`) VALUES ('01', '2021-02-19', '2021-02-26', 'john', 'room05');

SELECT * FROM `bookings` WHERE 1