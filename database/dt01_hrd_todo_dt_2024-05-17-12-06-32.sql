DROP TABLE IF EXISTS dt01_hrd_todo_dt;

CREATE TABLE `dt01_hrd_todo_dt` (
  `ORG_ID` varchar(36) NOT NULL,
  `USER_ID` varchar(36) NOT NULL,
  `TODO_ID` varchar(36) NOT NULL,
  `TODO` varchar(4000) NOT NULL,
  `PRIORITY` varchar(1) NOT NULL DEFAULT '1',
  `STATUS` varchar(1) NOT NULL DEFAULT '0',
  `DUE_DATE` date DEFAULT NULL,
  `ACTIVE` varchar(1) NOT NULL DEFAULT '1',
  `CREATED_BY` varchar(36) NOT NULL,
  `CREATED_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`TODO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "5ca35332-4ada-4ce8-9afc-12853afce3f0", "Minggu Ini", "3", "0", "2024-05-18", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-14 10:31:32");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "70ab433b-fc9f-4f33-b272-007be177f0f4", "sadas", "1", "0", "2024-05-16", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-17 16:11:24");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "9281a0d9-e669-4cfd-8789-3d2e1368c67f", "Hari Ini 1", "4", "0", "2024-05-14", "0", "0fdf0dc6-bcbc-4ef8-814b-02b127b690d8", "2024-05-14 10:31:32");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "b36cb6cf-36dd-4679-bbce-e66d1eaff0f4", "Hari Ini", "0", "0", "2024-05-17", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-17 16:01:53");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "d7e60d0b-df1c-4c33-bb2d-e6898ec4a54a", "Teguh", "3", "0", "2024-05-18", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-17 14:25:15");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "e11ed09c-9918-4dd9-9e02-d76c46a867dd", "Bulan Ini", "1", "0", "2024-05-31", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-14 10:31:32");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "e35b7a47-72cd-4f1a-8ad0-afe66ec30e6b", "Hari Ini 3", "2", "1", "2024-05-14", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-14 10:31:32");
INSERT INTO dt01_hrd_todo_dt VALUES ("10c84edd-500b-49e3-93a5-a2c8cd2c8524", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "e7a57c28-69c3-467e-90f0-211ac39c4fcd", "irawan", "2", "0", "2024-05-18", "1", "ac55c7c3-bf4a-48cb-86b8-f1d02de32c7c", "2024-05-17 14:26:17");



