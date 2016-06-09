CREATE DATABASE FosterCare;

use FosterCare;


CREATE TABLE CaseWorker
(
	CaseWorkerID         INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	EmailID				 VARCHAR(100) NULL,	
	FirstName            VARCHAR(50) NULL,
	LastName             VARCHAR(50) NULL,
	LicenseNumber        VARCHAR(50) NULL,
    AddressID			 Integer NULL
);

CREATE TABLE Address
(
	AddressID            INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	AddressLine1         VARCHAR(50) NULL,
	AddressLine2         VARCHAR(50) NULL,
	CityName             VARCHAR(50) NULL,
	StateCode            VARCHAR(50) NULL,
	PostalCode           VARCHAR(50) NULL
);


CREATE TABLE Facility
(
	FacilityID           		INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FacilityName         		VARCHAR(50) NULL,
	Licensee             		VARCHAR(50) NULL,
	FacilityAdministrator 		VARCHAR(50) NULL,
	AddressID					Integer Not Null,
    FacilityTypeID       		INTEGER Not NULL
);

CREATE TABLE FacilityType
(
	FacilityTypeID       INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Name           	      VARCHAR(50) NULL,
    Description           VARCHAR(100) NULL
);


CREATE TABLE FosterChild
(
	FosterChildID        INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FirstName            VARCHAR(50) NULL,
	LastName             VARCHAR(50) NULL,
	DateOfBirth          DATE NULL
);

CREATE TABLE FosterParent
(
	FosterParentID       INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    EmailID				 VARCHAR(100) NULL,	
	FirstName            VARCHAR(50) NULL,
	LastName             VARCHAR (50) NULL,
	DateOfBirth          DATE NULL,
	AddressID			 Integer Not Null	
);

CREATE TABLE FosterParentCaseWorkerMessage
(
	FosterParentCaseWorkerMessageID INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CaseWorkerID         INTEGER NOT NULL,
	FosterParentID       INTEGER NOT NULL,	
	MessageText          VARCHAR(8000) NULL,
    MessageDate			 Date not null 	
);

CREATE TABLE FosterParentChild
(
	FosterParentChildID  INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FosterParentID       INTEGER NOT NULL,	
	FosterChildID        INTEGER NOT NULL
);


ALTER TABLE Facility
ADD FOREIGN KEY Facility_To_Facility_Type (FacilityTypeID) REFERENCES FacilityType (FacilityTypeID);

ALTER TABLE Facility
ADD FOREIGN KEY Facility_To_Address (AddressID) REFERENCES Address (AddressID);

ALTER TABLE FosterParent
ADD FOREIGN KEY FosterParent_To_Address (AddressID) REFERENCES Address (AddressID);

ALTER TABLE CaseWorker
ADD FOREIGN KEY CaseWorker_To_Address (AddressID) REFERENCES Address (AddressID);

ALTER TABLE FosterParentCaseWorkerMessage
ADD FOREIGN KEY FosterParentCaseWorkerMessage_To_Case_Worker (CaseWorkerID) REFERENCES CaseWorker (CaseWorkerID);

ALTER TABLE FosterParentCaseWorkerMessage
ADD FOREIGN KEY FosterParentCaseWorkerMessage_To_FosterParent (FosterParentID) REFERENCES FosterParent (FosterParentID);

ALTER TABLE FosterParentChild
ADD FOREIGN KEY FosterParentChild_To_FosterParent (FosterParentID) REFERENCES FosterParent (FosterParentID);

ALTER TABLE FosterParentChild
ADD FOREIGN KEY FosterParentChild_To_FosterChild (FosterChildID) REFERENCES FosterChild (FosterChildID);

