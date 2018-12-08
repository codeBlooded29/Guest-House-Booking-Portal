CREATE DATABASE GUESTROOM;
USE GUESTROOM;

CREATE TABLE `Users` (
 `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
 `password` varchar(256) NOT NULL,
 `dob` date NOT NULL,
 `name` varchar(256) NOT NULL,
 `mobile_number` varchar(10) NOT NULL,
 `webmail_id` varchar(256) NOT NULL,
 `person_id` varchar(256) NOT NULL,
 PRIMARY KEY (`webmail_id`),
 UNIQUE KEY `mobile_number` (`mobile_number`),
 UNIQUE KEY `email_id` (`webmail_id`),
 UNIQUE KEY `webmail_id` (`webmail_id`),
 UNIQUE KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `Rooms` (
 `room_number` varchar(256) NOT NULL,
 `cost_per_night` int(11) NOT NULL DEFAULT '200',
 `maintenance_required` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`room_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `Booking_Info` (
 `booking_id` int(11) NOT NULL AUTO_INCREMENT,
 `webmail_id` varchar(256) NOT NULL,
 `room_number` varchar(256) NOT NULL,
 `checkIn_date` date NOT NULL,
 `checkOut_date` date NOT NULL,
 `approval_status` tinyint(1) NOT NULL DEFAULT '0',
 `guest_name` varchar(256) NOT NULL,
 `guest_mno` varchar(10) NOT NULL,
 `relationship` varchar(256) NOT NULL,
 `coming_from` varchar(256) NOT NULL,
 `booking_reason` text NOT NULL,
 PRIMARY KEY (`booking_id`),
 KEY `room_number` (`room_number`),
 KEY `FK_webmail` (`webmail_id`),
 CONSTRAINT `Booking_Info_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `Rooms` (`room_number`),
 CONSTRAINT `FK_webmail` FOREIGN KEY (`webmail_id`) REFERENCES `Users` (`webmail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1

CREATE TABLE `Admins` (
 `emp_id` varchar(256) NOT NULL,
 `name` varchar(256) NOT NULL,
 `webmail_id` varchar(256) NOT NULL,
 `password` varchar(256) NOT NULL,
 PRIMARY KEY (`emp_id`),
 UNIQUE KEY `webmail_id` (`webmail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='to store information of admins'

CREATE TABLE `Students` (
 `roll_number` varchar(256) NOT NULL,
 `name` varchar(256) NOT NULL,
 `dob` date NOT NULL,
 `department` varchar(256) NOT NULL,
 `webmail_id` varchar(256) NOT NULL,
 `hostel_block` varchar(256) NOT NULL,
 `room_number` varchar(256) NOT NULL,
 `edu_programme` varchar(256) NOT NULL,
 `year_of_study` smallint(6) NOT NULL,
 `password` varchar(256) NOT NULL,
 `mobile_number` varchar(10) NOT NULL,
 PRIMARY KEY (`roll_number`),
 UNIQUE KEY `roll_number` (`roll_number`),
 UNIQUE KEY `webmail_id` (`webmail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `Leave_Record` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `roll_number` varchar(256) NOT NULL,
 `start_date` date NOT NULL,
 `end_date` date NOT NULL,
 `reason` text NOT NULL,
 `approval_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 means not approved yet',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
