
CREATE TABLE feedback (
  ID int(10) NOT NULL,
  FEED_NAME varchar(50) NOT NULL,
  FEED_EMAIL varchar(50) NOT NULL,
  FEED_CONTACT varchar(50) NOT NULL,
  FEED_SUBJECT varchar(50) NOT NULL,
  FEED_MESSAGE varchar(50) NOT NULL,
  FEED_DATE date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE links (
  link_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  link longtext NOT NULL,
  title varchar(50) NOT NULL,
  description varchar(100) NOT NULL,
  date date NOT NULL,
  readmore longtext NOT NULL,
  UNIQUE KEY link_id (link_id)
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE applications (
  id INT(11) NOT NULL AUTO_INCREMENT,
  child_name varchar(100) NOT NULL,
  dob date NOT NULL,
  minor_address text NOT NULL,
  parent_name varchar(100) NOT NULL,
  parent_address text NOT NULL,
  validity_period enum('1','2') NOT NULL,
  companion_name varchar(100) DEFAULT NULL,
  companion_address text DEFAULT NULL,
  companion_relationship varchar(100) DEFAULT NULL,
  destination varchar(100) NOT NULL,
  purpose text NOT NULL,
  submitted_at timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
