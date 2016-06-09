select *from fosterparent;
select *from Address;
select * from caseworker;

SELECT Caseworkerid as id, firstname, lastname FROM caseworker;
SELECT fosterparentid as id, firstname, lastname FROM fosterparent

SET SQL_SAFE_UPDATES = 0;

call  AddUpdateFosterparent (5,'ram@ram.com1','Ram12','mala6','1980-06-06','161121 Capitol Ave','','Folsom6','PA','95636',@Status,@newid);

insert into Address(AddressID, AddressLine1, AddressLine2, CityName,StateCode, postalCode)
            VALUES( '1980-06-06','16112 Capitol Ave','','Folsom6','PA','95636');
            
            Insert into FosterParent(EmailID, Firstname, Lastname, DateofBirth,AddressID)
            VALUES( EmailID, FirstName, LastName, DateOfBirth, LAST_INSERT_ID());


Select AddressID From FosterParent Where FosterparentID = 6;
select AddressID;

Select AddressID From FosterParent Where FosterparentID = 6;

    IN FosterParentID int,
    IN EmailID varchar(100),
    IN FirstName varchar(50),
    IN LastName varchar(50),
    IN DateOfBirth date,
    IN AddressLine1 varchar(100),
    IN AddressLine2 varchar(100),
    IN City varchar(100),
    IN State varchar(10),
    IN ZipCode varchar(20),
    OUT Status varchar(100),
    OUT NewID int

    
    drop procedure AddUpdateFosterparent;
    
select a.FirstName, a.LastName, a.EmailID, a.DateOfBirth, b.AddressLine1,b.AddressLine2, b.CityName, b.StateCode, b.PostalCode
From fosterparent a inner join address b on a.AddressID = b.AddressID
Where a.Fosterparentid=1;

select a.FirstName, a.LastName, a.EmailID, a.DateOfBirth, b.AddressLine1,b.AddressLine2, b.CityName, b.StateCode, b.PostalCode  From fosterparent a 
inner join address b on a.AddressID = b.AddressID Where a.Fosterparentid=1;
    
    
select c.FirstName,c.LastName,c.DateOfBirth from fosterparentchild a inner join fosterparent b on a.fosterparentid = b.fosterparentid
inner join fosterchild c on a.fosterchildid = c.fosterchildid
where a.fosterparentid=1;


select a.FacilityID, a.FacilityName, a.Licensee, a.FacilityAdministrator,
	concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address
from facility a inner join facilitytype b on a.facilitytypeid = b.facilitytypeid
inner join Address c on a.AddressID = c.AddressID
where b.facilitytypeid =1  And c.postalcode = 
	(select ad.PostalCode from fosterparent f inner join Address ad on f.Addressid	=ad.AddressID where f.FosterParentID=1) ; 


select a.FacilityID, a.FacilityName, a.Licensee, a.FacilityAdministrator, concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address from facility a inner join facilitytype b on a.facilitytypeid = b.facilitytypeid inner join Address c on a.AddressID = c.AddressID where b.facilitytypeid =1 And c.postalcode = (select ad.PostalCode from fosterparent f inner join Address ad on f.Addressid	=ad.AddressID where f.FosterParentID= 1);


select b.CaseWorkerID, concat(b.FirstName,' ',b.LastName)as 'Name', b.EmailID, b.LicenseNumber, a.MessageText, a.MessageDate,
	concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address
from fosterparentcaseworkermessage a inner join caseworker b on a.caseworkerid= b.caseworkerid
inner join Address c on b.AddressID = c.AddressID
inner join fosterparent d on a.fosterparentid=d.fosterparentid
where d.FosterParentID=1;

select b.fosterparentid, concat(b.FirstName,' ',b.LastName)as 'Name', b.EmailID, a.MessageText, a.MessageDate,
	concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode) As Address
from fosterparentcaseworkermessage a inner join fosterparent b on a.fosterparentid= b.fosterparentid
inner join Address c on b.AddressID = c.AddressID
inner join caseworker d on a.CaseWorkerID=d.CaseWorkerID
where d.CaseWorkerID=1;


select b.fosterparentid, concat(b.FirstName,' ',b.LastName)as 'Name', b.EmailID, a.MessageText, a.MessageDate, 
concat(trim(c.AddressLine1), ' ',trim(c.AddressLine2), ', ',c.CityName,', ',c.StateCode,', ',c.PostalCode)
 As Address from fosterparentcaseworkermessage a inner join fosterparent b on a.fosterparentid= b.fosterparentidinner 
 join Address c on b.AddressID = c.AddressID inner join caseworker d on a.CaseWorkerID=d.CaseWorkerID where d.CaseWorkerID=1;


select * from fosterparentcaseworkermessage where FosterParentID=1;



