DROP TABLE IF EXISTS dt01_gen_enviroment_ms;

CREATE TABLE `dt01_gen_enviroment_ms` (
  `ORG_ID` varchar(36) NOT NULL,
  `ENV_ID` varchar(36) NOT NULL,
  `ENVIRONMENT_NAME` varchar(1000) NOT NULL,
  `DEV` varchar(1000) NOT NULL,
  `PROD` varchar(1000) DEFAULT NULL,
  `ACTIVE` varchar(1) NOT NULL DEFAULT '1',
  `CREATED_BY` varchar(36) NOT NULL,
  `CREATED_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ENV_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "4cf1de59-1805-4649-bfd9-054b067d527d", "CLIENT_ID_TILAKA", "be2642fe-a581-4a69-aaad-ed8174dddc7e", "9cb698e9-9ac1-4cbf-a12a-9e1dda6e4630", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "53958b2a-6f73-4e4f-9703-40b64959d755", "CLIENT_SECRET_TILAKA", "3fa22ba0-7a81-4244-9694-b857f0e83cd8", "079dead8-6798-4f92-8c0b-905a443b5d40", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "5a9bc4e9-77f9-441d-8e69-2785a7e147f8", "TILAKA_BASE_URL", "https://sb-api.tilaka.id/", "https://api.tilaka.id/", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "678bb734-3849-4a84-8c1b-3526c6029f95", "TILAKALITE_URL", "http://10.10.11.253:8088/", "http://10.10.11.250:8088/", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "67aeb868-636b-4e86-9cc1-690bbba5216d", "PATHFILE_POST", "C:\\xampp\\htdocs\\webapps\\berkasrawat\\pages\\upload", "http://192.168.102.242:8080/webappsagus/berkasrawat/pages/upload", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "6938614d-276b-4161-a470-32156c1e3980", "PATHFILE_GET", "C:\\xampp\\htdocs\\webapps\\berkasrawat\\pages\\upload", "http://192.168.102.12/webappsagus/berkasrawat/pages/upload", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "7b31610f-f3de-4dde-86b6-6c22e8a2f309", "COORDINATE_X", "10", "10", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "a7a2ef53-c1df-4911-9e02-f4bebfa9e4ee", "COORDINATE_Y", "10", "10", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "b61b421d-b824-41a5-ad14-a4c412e4e11e", "HEIGHT", "70", "70", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "c952ea22-ef19-4aa6-9a11-0b639cdb9dbc", "ORG_ID", "10c84edd-500b-49e3-93a5-a2c8cd2c8524", "10c84edd-500b-49e3-93a5-a2c8cd2c8524", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 10:25:12");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "dfefa28c-c03a-425c-9557-ebb6d37ba4ee", "WIDTH", "550", "550", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");
INSERT INTO dt01_gen_enviroment_ms VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "fda0e07a-f1f9-4a7e-9b7f-5b2501dd5e8d", "PAGE", "1", "1", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-26 09:21:18");



