use fostercare;

select * from fosterparent;


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1615 Capitol Ave','','Sacramento','CA','95814';

insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1616 Capitol Ave','','Sacramento','CA','95814';


insert into address(AddressLine1,AddressLine2,CityName,StateCode,PostalCode)
select '1617 Capitol Ave','','Sacramento','CA','95814';


select * from address;

insert into fosterparent(FirstName,LastName,DateOfBirth,AddressID)
select 'John' ,'Doe','1942-01-01',1;

insert into fosterparent(FirstName,LastName,DateOfBirth,AddressID)
select 'Sue' ,'Doe','1952-01-01',2;

insert into fosterparent(FirstName,LastName,DateOfBirth,AddressID)
select 'Kevin' ,'Doe','1962-01-01',3;