CREATE TABLE `types` (
  `typeId` int(11) NOT NULL,
  `typeName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `types` (`typeId`, `typeName`) VALUES
(1, 'Allergies'),
(2, 'Nonprescription'),
(3, 'Prescription'),
(4, 'Toiletries');

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(40) NOT NULL,
  `typeName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `items` (`itemId`, `itemName`, `typeName`) VALUES
(1,'Zyrtec', 'Allergies'),
(2,'Allegra', 'Allergies'),
(3,'Xyzal', 'Allergies'),
(4,'Claritin', 'Allergies'),
(5,'Dimetapp', 'Allergies'),
(6,'Tavist', 'Allergies'),
(7,'Benadryl', 'Allergies'),
(8,'Ocuhist Drops', 'Allergies'),
(9,'Clarinex', 'Allergies'),
(10,'Astelin Aerosol', 'Allergies'),
(11,'Nicorette Gum', 'Nonprescription'),
(12,'Codeine', 'Nonprescription'),
(13,'Extenze', 'Nonprescription'),
(14,'Robax Platinum', 'Nonprescription'),
(15,'Sudafed Elixir', 'Nonprescription'),
(16,'Robitussin', 'Nonprescription'),
(17,'Ibuprofen', 'Nonprescription'),
(18,'Tylenol', 'Nonprescription'),
(19,'Advil', 'Nonprescription'),
(20,'Aleve', 'Nonprescription'),
(21,'Synthroid', 'Prescription'),
(22,'Crestor', 'Prescription'),
(23,'Ventolin HFA', 'Prescription'),
(24,'Nexium', 'Prescription'),
(25,'Januvia', 'Prescription'),
(26,'Advair Diskus', 'Prescription'),
(27,'Spiriva', 'Prescription'),
(28,'Lyrica', 'Prescription'),
(29,'Vyvanse', 'Prescription'),
(30,'Lantus Vial', 'Prescription'),
(31,'Tooth Brush', 'Toiletries'),
(32,'Tooth Paste', 'Toiletries'),
(33,'Pressure Monitor', 'Toiletries'),
(34,'Soap', 'Toiletries'),
(35,'Heating Pad', 'Toiletries'),
(36,'Tissue', 'Toiletries'),
(81,'Thermometer', 'Toiletries'),
(91,'Sanitizer', 'Toiletries'),
(101,'Gloves', 'Toiletries'),
(111,'Condoms', 'Toiletries');



CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`userId`, `userName`, `password`) VALUES
(1, 'diego', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'),
(2, 'garred', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'),
(3, 'gabe', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'),
(4, 'angel', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4');


ALTER TABLE `types`
  ADD PRIMARY KEY (`typeId`);


ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

ALTER TABLE `types`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;


ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;