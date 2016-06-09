use fostercare;

select * from fosterparent;


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1615 Capitol Ave','','Sacramento','CA','95814';

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1616 Capitol Ave','','Sacramento','CA','95814';


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1617 Capitol Ave','','Sacramento','CA','95814';


select * from address;

insert into fosterparent(emailid,FirstName,LastName,DateOfBirth,AddressID)
select 'JohnDoe@example.com','John' ,'Doe','1942-01-01',1;

insert into fosterparent(emailid,FirstName,LastName,DateOfBirth,AddressID)
select 'SueDoe@example.com','Sue' ,'Doe','1952-01-01',2;

insert into fosterparent(emailid,FirstName,LastName,DateOfBirth,AddressID)
select 'kevinDoe@example.com','Kevin' ,'Doe','1962-01-01',3;


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1617 Capitol Ave','','Sacramento','CA','95814';
insert into caseworker(emailid,FirstName,LastName,LicenseNumber,AddressID)
select 'kevinTheCaseWorker@example.com','Kevin' ,'Doe','CA112435',LAST_INSERT_ID();


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1617 Capitol Ave','','Sacramento','CA','95814';
insert into caseworker(emailid,FirstName,LastName,LicenseNumber,AddressID)
select 'PetrsonTheCaseWorker@example.com','Peterson' ,'Doe','CA112435',LAST_INSERT_ID();


insert into fosterchild(firstname,lastname,DateOfBirth)
select 'FirstName1','LastName1','1995-01-01';


insert into fosterchild(firstname,lastname,DateOfBirth)
select 'FirstName2','LastName2','1996-01-01';


insert into fosterchild(firstname,lastname,DateOfBirth)
select 'FirstName3','LastName3','1997-01-01';

select * from fosterchild;
select * from fosterparent;

select * from fosterparentchild;

insert into fosterparentchild(fosterchildid,fosterparentid)
select 1,1 union all select 2,1 union all select 3,1;

insert into fosterparentchild(fosterchildid,fosterparentid)
select 1,2 union all select 2,2 union all select 3,2;

insert into fosterparentchild(fosterchildid,fosterparentid)
select 1,3 union all select 2,3 union all select 3,3;

use fostercare;
select * from facilitytype;
insert into facilitytype(name, Description) select 'Residential Facility','Residential Facility';
insert into facilitytype(name, Description) select 'Foster Agency Locations','Foster Agency Locations';

select * from facility;
select distinct PostalCode from address;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1000 Foster Ave','','Sacramento','CA','95814';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Residential facility 1','John','Jane',LAST_INSERT_ID(),1;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1002 Children Ave','','Sacramento','CA','95830';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Residential facility 2','pete','Linda',LAST_INSERT_ID(),1;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1003 Kids Ave','','Sacramento','CA','95836';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Residential facility 3','Petricia','Roger',LAST_INSERT_ID(),1;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1003 Kids Ave','','Sacramento','CA','95630';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Residential facility 3','Petricia','Roger',LAST_INSERT_ID(),1;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1003 Kids Ave','','Sacramento','CA','95636';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Residential facility 3','Petricia','Roger',LAST_INSERT_ID(),1;


#agency locations

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1000 Foster Ave','','Sacramento','CA','95814';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Foster Family Location 1','John','Jane',LAST_INSERT_ID(),2;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1002 Children Ave','','Sacramento','CA','95830';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Foster Family Location 2','pete','Linda',LAST_INSERT_ID(),2;

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1003 Kids Ave','','Sacramento','CA','95836';
insert into facility(FacilityName,Licensee,FacilityAdministrator,AddressID,FacilityTypeID)
select 'Foster Family Location 3','Petricia','Roger',LAST_INSERT_ID(),2;


select *from caseworker;

select * from fosterparentcaseworkermessage;
insert into fosterparentcaseworkermessage(CaseWorkerID,FosterParentID,MessageText,MessageDate)
select a.CaseWorkerID,b.FosterParentID,'Inquiry about my child','2016-02-01'
From caseworker a, fosterparent b ;










