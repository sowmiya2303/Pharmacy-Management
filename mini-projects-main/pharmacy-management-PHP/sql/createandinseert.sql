CREATE TABLE customer (
SSN DOUBLE NOT NULL,
first_name CHAR(20) NOT NULL,
last_name CHAR(20) NOT NULL,
phone DOUBLE NOT NULL UNIQUE,
gender CHAR(1) NOT NULL,
address CHAR(70) NOT NULL,
date_of_birth DATE NOT NULL,
insurance_id DOUBLE NOT NULL UNIQUE,
PRIMARY KEY (SSN)
);

CREATE TABLE prescription (
prescription_id DOUBLE NOT NULL,
SSN DOUBLE NOT NULL,
doctor_id DOUBLE NOT NULL,
prescribed_date DATE NOT NULL,
PRIMARY KEY (prescription_id)
);


CREATE TABLE prescribed_drugs (
prescription_id DOUBLE NOT NULL,
drug_name CHAR(20) NOT NULL,
prescribed_quantity DOUBLE NOT NULL,
refill_limit DOUBLE NOT NULL,
PRIMARY KEY (prescription_id,
drug_name)
);


CREATE TABLE orderrr (
orderrr_id DOUBLE NOT NULL,
prescription_id DOUBLE NOT NULL,
EmployeeID DOUBLE NOT NULL,
orderrr_date DATE NOT NULL,
PRIMARY KEY (orderrr_id)
);


CREATE TABLE ordedred_drugs (
orderrr_id DOUBLE NOT NULL,
drug_name CHAR(20) NOT NULL,
batch_number DOUBLE NOT NULL,
orderrred_quantity DOUBLE NOT NULL,
Price DOUBLE NOT NULL,
PRIMARY KEY (orderrr_id,
drug_name,
batch_number)
);


CREATE TABLE insurance (
insurance_id DOUBLE NOT NULL,
company_name CHAR(20) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
co_insurance INT NOT NULL,
PRIMARY KEY (insurance_id)
);

CREATE INDEX insurance_company_name
ON insurance (company_name);
CREATE TABLE Employee (
ID DOUBLE NOT NULL,
SSN DOUBLE NOT NULL UNIQUE,
License DOUBLE UNIQUE,
first_name CHAR(20) NOT NULL,
last_name CHAR(20) NOT NULL,
start_date DATE NOT NULL,
end_date DATE,
role CHAR(20) NOT NULL,
salary DOUBLE NOT NULL,
phone_number DOUBLE NOT NULL,
date_of_birth DATE NOT NULL,
PRIMARY KEY (ID)
);

CREATE TABLE medicine (
drug_name CHAR(20) NOT NULL,
batch_number DOUBLE NOT NULL,
MedicineType CHAR(20) NOT NULL,
Manufacturer CHAR(20) NOT NULL,
stock_quantity DOUBLE NOT NULL,
expiry_date DATE NOT NULL,
Price DOUBLE NOT NULL,
PRIMARY KEY (drug_name,
batch_number)
);
CREATE TABLE bill (
orderrr_id DOUBLE NOT NULL,
CustomerSSN DOUBLE NOT NULL,
total_amount DOUBLE NOT NULL,

customer_payment DOUBLE NOT NULL,
insurance_payment DOUBLE NOT NULL,
PRIMARY KEY (orderrr_id,
CustomerSSN)
);

CREATE TABLE disposed_drugs (
drug_name CHAR(20) NOT NULL,
batch_number DOUBLE NOT NULL,
Quantity DOUBLE NOT NULL,
Company CHAR(20) NOT NULL,
PRIMARY KEY (drug_name,
batch_number)
);

CREATE TABLE notification (
ID DOUBLE NOT NULL,
Message CHAR(20) NOT NULL,
Type CHAR(20) NOT NULL,
PRIMARY KEY (ID)
);

CREATE TABLE employee_notification (
EmployeeID DOUBLE NOT NULL,
NotificationID DOUBLE NOT NULL,
PRIMARY KEY (EmployeeID,
NotificationID)
);

CREATE TABLE employee_disposed_drugs (
EmployeeID DOUBLE NOT NULL,
drug_name CHAR(20) NOT NULL,
batch_number DOUBLE NOT NULL,
disposal_date DATE NOT NULL,
PRIMARY KEY (EmployeeID,
drug_name,
batch_number,
disposal_date)
);

ALTER TABLE customer
ADD CONSTRAINT insures FOREIGN KEY (insurance_id) REFERENCES insurance (insurance_id) ON DELETE
SET NULL;

ALTER TABLE prescription
ADD CONSTRAINT holds FOREIGN KEY (SSN) REFERENCES customer (SSN);

ALTER TABLE prescribed_drugs
ADD CONSTRAINT "consists of" FOREIGN KEY (prescription_id) REFERENCES prescription (prescription_id) ON
DELETE CASCADE;


ALTER TABLE orderrr
ADD CONSTRAINT prepares FOREIGN KEY (EmployeeID) REFERENCES employee (ID);

ALTER TABLE orderrr
ADD CONSTRAINT uses FOREIGN KEY (prescription_id) REFERENCES prescription (prescription_id);


ALTER TABLE orderrred_drugs
ADD CONSTRAINT "contains" FOREIGN KEY (orderrr_id) REFERENCES orderrr (orderrr_id) ON DELETE
CASCADE;

ALTER TABLE orderrred_drugs
ADD CONSTRAINT "Fulfilled From" FOREIGN KEY (drug_name, batch_number) REFERENCES medicine
(drug_name, batch_number);


ALTER TABLE bill
ADD CONSTRAINT makes FOREIGN KEY (orderrr_id) REFERENCES orderrr (orderrr_id);

ALTER TABLE bill
ADD CONSTRAINT pays FOREIGN KEY (CustomerSSN) REFERENCES customer (SSN);

ALTER TABLE disposed_drugs
ADD CONSTRAINT disposed FOREIGN KEY (drug_name, batch_number) REFERENCES medicine (drug_name,
batch_number);

ALTER TABLE employee_notification
ADD CONSTRAINT FKEmployee_N849182 FOREIGN KEY (EmployeeID) REFERENCES employee (ID) ON
DELETE CASCADE;


ALTER TABLE employee_notification
ADD CONSTRAINT FKEmployee_N664471 FOREIGN KEY (NotificationID) REFERENCES notification (ID) ON
DELETE CASCADE;

ALTER TABLE employee_disposed_drugs
ADD CONSTRAINT FKEmployee_D470142 FOREIGN KEY (EmployeeID) REFERENCES employee (ID);


ALTER TABLE employee_disposed_drugs
ADD CONSTRAINT FKEmployee_D990025 FOREIGN KEY (drug_name, batch_number) REFERENCES disposed_drugs (drug_name, batch_number);


