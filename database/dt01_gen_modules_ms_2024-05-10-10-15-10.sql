DROP TABLE IF EXISTS dt01_gen_modules_ms;

CREATE TABLE `dt01_gen_modules_ms` (
  `MODULES_ID` varchar(36) NOT NULL,
  `MODULES_NAME` varchar(100) NOT NULL,
  `VERSION` varchar(100) NOT NULL,
  `MODULES_HEADER_ID` varchar(36) NOT NULL,
  `PACKAGE` varchar(100) NOT NULL,
  `DEF_CONTROLLER` varchar(100) NOT NULL,
  `PARENT` varchar(1) NOT NULL DEFAULT 'N',
  `ICON` varchar(500) NOT NULL,
  `STATUS` varchar(1) NOT NULL DEFAULT '0',
  `URUT` int(11) NOT NULL DEFAULT 0,
  `ACTIVE` varchar(1) NOT NULL DEFAULT '1',
  `CREATED_BY` varchar(36) NOT NULL,
  `CREATED_DATE` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`MODULES_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO dt01_gen_modules_ms VALUES ("01b1b52a-7d47-4352-b145-37d9bb2646c3", "Tilaka", "", "45304d5b-390d-4618-a08d-793b475f37b7", "tilaka", "", "Y", "bi bi-filetype-pdf", "0", "998", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("171a2550-9fa1-4fe8-84c3-7b61b7cc2c55", "Sign Document", "", "01b1b52a-7d47-4352-b145-37d9bb2646c3", "tilaka", "signdocument", "N", "bi bi-vector-pen", "0", "2", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("1eebee7e-a774-4572-a660-8ab49f6a734a", "Dashboard", "", "9b873e90-d8fd-48f3-8c98-ec2aff0c207f", "dashboard", "dashboard", "N", "bi bi-grid", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:08:59");
INSERT INTO dt01_gen_modules_ms VALUES ("266bd8f2-8e09-404b-985e-0196c14218fa", "Human Resource Development", "", "9b873e90-d8fd-48f3-8c98-ec2aff0c207f", "hrd", "", "Y", "bi bi-people", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:08:59");
INSERT INTO dt01_gen_modules_ms VALUES ("45304d5b-390d-4618-a08d-793b475f37b7", "Bridging System", "", "", "", "", "C", "", "0", "997", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("4610c39b-de32-450b-812d-db8c37fcc643", "Repository Document", "", "01b1b52a-7d47-4352-b145-37d9bb2646c3", "tilaka", "repodocument", "N", "bi bi-archive", "0", "3", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("49e22574-cb55-450f-9d47-6b895b2caed3", "Modules", "", "988c76dd-f5d3-4aca-bea2-1249f980bfc9", "masterroot", "mastermodules", "N", "bi bi-code-slash", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:00:57");
INSERT INTO dt01_gen_modules_ms VALUES ("4ca01133-e004-428d-bc56-4e9e2dbdbbd6", "Master System", "", "266bd8f2-8e09-404b-985e-0196c14218fa", "hrd", "", "Y", "bi bi-database", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:00:57");
INSERT INTO dt01_gen_modules_ms VALUES ("510acdce-1c9c-49ab-8f91-fc8a77fc4dc4", "Registrasi", "", "01b1b52a-7d47-4352-b145-37d9bb2646c3", "tilaka", "registrasi", "N", "bi bi-people", "0", "1", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("6c105bb7-633d-4f59-b0d0-37b6dcc59bb7", "IT Operation", "", "", "", "", "C", "", "0", "998", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("7c69522f-cebf-4377-945a-3324b0a26baa", "Developer", "", "", "", "", "C", "", "0", "999", "9", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("7e0b2ac1-cdac-4eee-8392-fa92e227fa2c", "Domisili", "", "988c76dd-f5d3-4aca-bea2-1249f980bfc9", "masterroot", "domisili", "N", "bi bi-compass", "0", "999", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:25:26");
INSERT INTO dt01_gen_modules_ms VALUES ("868afde4-08e8-4899-b596-301c1bae2258", "Service API", "", "6c105bb7-633d-4f59-b0d0-37b6dcc59bb7", "operation", "logservice", "N", "bi bi-layers", "0", "0", "1", "", "2024-04-29 23:10:27");
INSERT INTO dt01_gen_modules_ms VALUES ("988c76dd-f5d3-4aca-bea2-1249f980bfc9", "Master Root System", "", "7c69522f-cebf-4377-945a-3324b0a26baa", "masterroot", "", "Y", "bi bi-database", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:59:33");
INSERT INTO dt01_gen_modules_ms VALUES ("9b873e90-d8fd-48f3-8c98-ec2aff0c207f", "Apps", "", "", "", "", "C", "", "0", "1", "9", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 08:56:49");
INSERT INTO dt01_gen_modules_ms VALUES ("aa816bb5-2197-4c1a-90b2-f1e955063ca8", "Backup Database", "", "6c105bb7-633d-4f59-b0d0-37b6dcc59bb7", "operation", "backupdb", "N", "bi bi-layers", "0", "0", "1", "", "2024-04-29 23:10:27");
INSERT INTO dt01_gen_modules_ms VALUES ("d014e2f9-3d6d-49c7-8a00-63fde9a58b40", "Table Database", "", "6c105bb7-633d-4f59-b0d0-37b6dcc59bb7", "operation", "tabledb", "N", "bi bi-layers", "0", "0", "1", "", "2024-04-29 23:10:27");
INSERT INTO dt01_gen_modules_ms VALUES ("f71515e5-57b8-41de-9c49-5e494c497563", "Position", "", "4ca01133-e004-428d-bc56-4e9e2dbdbbd6", "hrd", "", "N", "bi bi-person-badge", "0", "0", "1", "ab24ee31-f74c-4f86-a07b-27196b57e7a6", "2024-04-27 09:31:40");



