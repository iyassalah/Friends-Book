SELECT * FROM `users` WHERE password = SHA2(CONCAT('salt', 'test'), 256);

