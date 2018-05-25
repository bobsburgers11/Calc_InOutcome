USE tenancymanager_t;

INSERT INTO `user`(`firstname`, `lastname`, `username`, `hash`, `email`) 
    VALUES ('Alexander', 'Noever', 'Alex', '$2a$10$sPnyVH0hhawfd1YWBCpqxeuo0cvFTd1gVHTLcx53KN6xs.cZdeqB2', 'alex@gmail.com'),
            ('Simon', 'Zahnd', 'Simon', 'Bob', 'simon@gmail.com'),
            ('Heiko', 'Meier', 'Heiko', '$2a$10$Klo9dU7cfz1KPgGylpghBebqKlK1HrKVlJzpVdLG4DaxtLOx0apd.', 'heiko@gmail.com');

INSERT INTO `city`(`postcode`, `city`) 
    VALUES ('8834','Schindellegi'),
            ('5004','Aarau'),
            ('6000','Luzern'),
            ('6045','Meggen'),
            ('4600','Olten');

INSERT IGNORE INTO adress (street, streetnumber, postcode)
    VALUES ('Chaltenbodenstrasse', '6', '8834'),
            ('Neumattstrasse', '4', '5004'),
            ('Pilatusstrasse', '16', '6000'),
            ('Obermattstrasse', '2', '6045'),
            ('Von Rollstrasse', '10', '4600');

INSERT INTO tenant (title, firstname, lastname, birthday, marital_status, phone, mobile, email, id_adress)
    VALUES ('Herr', 'Clint', 'Eastwood', '1930-05-31', 'ledig', '058 854 96 21', '078 854 96 21', 'clint@gmail.com', '1'),
            ('Herr', 'Thomas', 'Hanne', '1964-07-12', 'verheiratet', '058 246 75 95', '079 246 75 95', 'thomas@gmail.com', '2'),
            ('Herr', 'Janosch', 'Nietlispach', '1988-02-28', 'ledig', '058 465 55 86', '079 465 55 86', 'janosch@gmail.com', '3'),
            ('Herr', 'Rainer', 'Telesko', '1968-09-23', 'verheiratet', '058 788 98 56', '078 788 98 56', 'rainer@gmail.com', '4'),
            ('Herr', 'Hakan', 'Yakin', '1977-02-22', 'verheiratet', '062 122 35 66', '079 122 35 66', 'hakan@gmail.com', '5'),
            ('Frau', 'Irene', 'Wunder', '1957-12-02', 'ledig', '062 533 65 89', '079 458 76 94', 'irene@gmail.com', '2'),
            ('Herr', 'Reto', 'Bühlmann', '1977-02-22', 'verheiratet', '062 122 35 66', '079 122 35 66', 'reto@gmail.com', '5'),
            ('Frau', 'Rebecca', 'Gianelli', '1989-12-01', 'ledig', '062 533 65 89', '079 458 76 94', 'rebecca@gmail.com', '2'),
            ('Herr', 'Kevin', 'Spacy', '1972-05-15', 'ledig', '062 223 15 74', '079 96 56', 'kevin@gmail.com', '2'),
            ('Frau', 'Petra', 'Klauser', '1982-07-09', 'ledig', '062 987 25 96', '079 987 25 96', 'petra@gmail.com', '2'),
            ('Herr', 'Reto', 'Müller', '1952-01-29', 'verheiratet', '062 963 56 45', '079 963 56 45', 'reto@gmail.com', '2'),
            ('Frau', 'Geraldine', 'Rüssli', '1988-09-07', 'ledig', '062 246 85 91', '079 246 85 91', 'geraldine@gmail.com', '2'),
            ('Herr', 'Klaus', 'Strauss', '1986-08-25', 'ledig', '062 913 43 53', '079 913 43 53', 'klaus@gmail.com', '2'),
            ('Frau', 'Sereina', 'Bühler', '1979-06-14', 'ledig', '062 954 95 98', '079 954 95 98', 'sereina@gmail.com', '2'),
            ('Herr', 'Ferdinand', 'Hohler', '1968-05-31', 'verheiratet', '062 741 47 14', '079 741 47 14', 'ferdinand@gmail.com', '2'),
            ('Frau', 'Julia', 'Halter', '1990-12-20', 'ledig', '062 365 53 65', '079 365 53 65', 'julia@gmail.com', '2');

INSERT INTO property (id_adress)
    VALUES ('1'),
            ('2');

INSERT INTO apartment (id_property, apartment_type, rooms, squaremeter)
    VALUES ('1', 'Attika', '6.5', '320'),
            ('1', 'Loft', '3.5', '600'),
            ('2', '3.OG Ost', '4.5', '200'),
            ('2', '4.OG West', '4.5', '235'),
            ('2', '5.OG Ost', '5.5', '220'),
            ('2', '1.OG Nord', '4.5', '140'),
            ('2', '1.OG West', '4.5', '120'),
            ('2', '2.OG Nord', '4.5', '140'),
            ('2', '2.OG West', '4.5', '120'),
            ('2', '2.OG Ost', '4.5', '120'),
            ('2', '3.OG West', '5.5', '200'),
            ('2', '4.OG Ost', '5.5', '220'),
            ('2', '5.OG West', '5.5', '235'),
            ('2', '1.OG Ost', '4.5', '120');

INSERT INTO tenancy_agreement (id_tenant, id_apartment, start_of_tenancy, end_of_tenancy, netrent, cancellationterms)
            VALUES ('1', '1','2005-09-01', '2018-09-30', '8000', '3 Monate'),
                    ('2', '2','2010-05-01', '2017-12-31', '10000', '3 Monate'),
                    ('3', '3','2008-03-01', '2099-12-31', '2250', '3 Monate'),
                    ('4', '4','2006-09-01', '2018-01-31', '2350', '3 Monate'),
                    ('5', '5','2010-09-01', '2020-06-30', '2800', '3 Monate'),
                    ('6', '6','2010-02-01', '2099-12-31', '1650', '3 Monate'),
                    ('7', '7','2012-05-01', '2017-12-31', '1450', '3 Monate'),
                    ('8', '8','2012-05-01', '2099-12-31', '1650', '3 Monate'),
                    ('9', '9','2015-03-01', '2099-12-31', '1450', '3 Monate'),
                    ('10', '10','2012-10-01', '2099-12-31', '1650', '3 Monate'),
                    ('11', '11','2014-11-01', '2099-12-31', '2250', '3 Monate'),
                    ('12', '12','2013-08-01', '2099-12-31', '2350', '3 Monate'),
                    ('13', '13','2013-09-01', '2099-12-31', '2800', '3 Monate'),
                    ('14', '14','2010-06-01', '2099-12-31', '1450', '3 Monate');

INSERT INTO invoice (amount, invoice_date, id_tenancy_agreement, invoice_type, invoicenr, `comment`, payed)
    VALUES ('8000', '2016-11-30', '1', 'Miete', '16113001', 'Monatsmiete Dezember', '1'),
            ('10000', '2016-11-30', '2', 'Miete', '16113002', 'Monatsmiete Dezember', '1'),
            ('2250', '2016-11-30', '3','Miete', '16113003', 'Monatsmiete Dezember', '1'),
            ('2350', '2016-11-30', '4', 'Miete', '16113004', 'Monatsmiete Dezember', '1'),
            ('2800', '2016-11-30', '5', 'Miete', '16113005', 'Monatsmiete Dezember', '0'),
            ('1650', '2016-11-30', '6', 'Miete', '16113006', 'Monatsmiete Dezember', '1'),
            ('1450', '2016-11-30', '7', 'Miete', '16113007', 'Monatsmiete Dezember', '1'),
            ('1650', '2016-11-30', '8','Miete', '16113008', 'Monatsmiete Dezember', '1'),
            ('1450', '2016-11-30', '9', 'Miete', '16113009', 'Monatsmiete Dezember', '1'),
            ('1650', '2016-11-30', '10', 'Miete', '16113010', 'Monatsmiete Dezember', '0'),
            ('2250', '2016-11-30', '11', 'Miete', '16113011', 'Monatsmiete Dezember', '1'),
            ('2350', '2016-11-30', '12','Miete', '16113012', 'Monatsmiete Dezember', '1'),
            ('2800', '2016-11-30', '13', 'Miete', '16113013', 'Monatsmiete Dezember', '0'),
            ('1450', '2016-11-30', '14', 'Miete', '16113014', 'Monatsmiete Dezember', '1'),
            ('8000', '2016-12-01', '3', 'Reparatur', '16120101', 'Fenster auswechseln', '0'),
            ('8000', '2016-10-30', '1', 'Miete', '16103001', 'Monatsmiete November', '1'),
            ('10000', '2016-10-30', '2', 'Miete', '16103002', 'Monatsmiete November', '1'),
            ('8000', '2016-10-30', '3','Miete', '16103003', 'Monatsmiete November', '1'),
            ('2250', '2016-10-30', '4', 'Miete', '16103004', 'Monatsmiete November', '1'),
            ('2350', '2016-10-30', '5', 'Miete', '16103005', 'Monatsmiete November', '1'),
            ('2800', '2016-10-30', '5', 'Miete', '16103006', 'Monatsmiete November', '1'),
            ('1650', '2016-10-30', '6', 'Miete', '16103007', 'Monatsmiete November', '1'),
            ('1450', '2016-10-30', '7', 'Miete', '16103008', 'Monatsmiete November', '1'),
            ('1650', '2016-10-30', '8','Miete', '16103009', 'Monatsmiete November', '1'),
            ('1450', '2016-10-30', '9', 'Miete', '16103010', 'Monatsmiete November', '1'),
            ('1650', '2016-10-30', '10', 'Miete', '16103011', 'Monatsmiete November', '1'),
            ('2250', '2016-10-30', '11', 'Miete', '16103012', 'Monatsmiete November', '1'),
            ('2350', '2016-10-30', '12','Miete', '16103013', 'Monatsmiete November', '1'),
            ('2800', '2016-10-30', '13', 'Miete', '16103014', 'Monatsmiete November', '1'),
            ('1450', '2016-10-30', '14', 'Miete', '16103005', 'Monatsmiete November', '1'),
            ('8000', '2016-09-30', '1', 'Miete', '16093001', 'Monatsmiete Oktober', '1'),
            ('10000', '2016-09-30', '2', 'Miete', '16093002', 'Monatsmiete Oktober', '1'),
            ('8000', '2016-09-30', '3','Miete', '16093003', 'Monatsmiete Oktober', '1'),
            ('2250', '2016-09-30', '4', 'Miete', '16093004', 'Monatsmiete Oktober', '1'),
            ('2350', '2016-09-30', '5', 'Miete', '16093005', 'Monatsmiete Oktober', '1'),
            ('1950', '2016-09-30', '1', 'Wasser', '16093006', 'Jahresrechnung Wasser 2016', '1'),
            ('2000', '2016-09-30', '2', 'Wasser', '16093006', 'Jahresrechnung Wasser 2016', '1'),
            ('1000', '2016-09-30', '3','Wasser', '16093006', 'Jahresrechnung Wasser 2016', '1'),
            ('1150', '2016-09-30', '4', 'Wasser', '16093006', 'Jahresrechnung Wasser 2016', '0'),
            ('1200', '2016-09-30', '5', 'Wasser', '16093006', 'Jahresrechnung Wasser 2016', '0'),
            ('2400', '2016-12-01', '1', 'Strom', '16120101', 'Jahresrechnung Strom 2016', '0'),
            ('3600', '2016-12-01', '2', 'Strom', '16120101', 'Jahresrechnung Strom 2016', '0'),
            ('2000', '2016-12-01', '3', 'Strom', '16120101', 'Jahresrechnung Strom 2016', '0'),
            ('2120', '2016-12-01', '4', 'Strom', '16120101', 'Jahresrechnung Strom 2016', '0'),
            ('2250', '2016-12-01', '5', 'Strom', '16120101', 'Jahresrechnung Strom 2016', '0'),
            ('3950', '2016-12-01', '1', 'Oel', '16120102', 'Jahresrechnung Oel 2016', '0'),
            ('4200', '2016-12-01', '2', 'Oel', '16120102', 'Jahresrechnung Oel 2016', '0'),
            ('1950', '2016-12-01', '3', 'Oel', '16120102', 'Jahresrechnung Oel 2016', '0'),
            ('2150', '2016-12-01', '4', 'Oel', '16120102', 'Jahresrechnung Oel 2016', '0'),
            ('2400', '2016-12-01', '5', 'Oel', '16120102', 'Jahresrechnung Oel 2016', '0');
            