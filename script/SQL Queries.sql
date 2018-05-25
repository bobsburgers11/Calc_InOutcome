/** bezahlte Rechnung: Filter nach Rechnungstyp -> Gruppiert nach Rechnungstyp **/
SELECT SUM(invoice.amount) AS totalAmount, invoice.invoice_type 
FROM invoice 
JOIN tenancy_agreement 
    ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN tenant 
    ON tenancy_agreement.id_tenant=tenant.id_tenant 
WHERE invoice.payed='1' AND invoice.invoice_type=:invoice_type;

/** bezahlte Rechnung: Filter nach Rechnungstyp -> Gruppiert nach Liegenschaft **/
SELECT adress.street, adress.streetnumber, city.postcode, city.city, SUM(invoice.amount) AS totalAmount FROM invoice JOIN tenancy_agreement ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN apartment
ON tenancy_agreement.id_apartment=apartment.id_apartment
JOIN property
ON apartment.id_property=property.id_property
JOIN adress
ON property.id_adress=adress.id_adress
JOIN city
ON adress.postcode=city.postcode
WHERE invoice.payed='1' AND invoice.invoice_type='Miete' GROUP BY property.id_property;

/** bezahlte Rechnung: Filter nach Rechnungstyp und Liegenschaft -> Gruppiert nach Mieter **/
SELECT tenant.lastname, tenant.firstname, SUM(invoice.amount) AS totalAmount 
FROM invoice 
JOIN tenancy_agreement 
ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN apartment 
ON tenancy_agreement.id_apartment=apartment.id_apartment 
JOIN tenant 
ON tenancy_agreement.id_tenant=tenant.id_tenant 
WHERE invoice.payed='1' 
AND invoice.invoice_type='Miete' 
AND apartment.id_property = '1' 
GROUP BY tenant.lastname

/**
*
*CREATE VIEWS
*
*
*
**/

CREATE
 ALGORITHM = UNDEFINED
 VIEW `report_type_payed`
 AS SELECT invoice.invoice_type, SUM(invoice.amount) AS total
FROM invoice 
JOIN tenancy_agreement 
ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement 
JOIN tenant 
ON tenancy_agreement.id_tenant=tenant.id_tenant 
WHERE invoice.payed='1' GROUP BY invoice.invoice_type

SELECT * FROM invoice
JOIN tenancy_agreement
ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
JOIN tenant
ON tenancy_agreement.id_tenant=tenant.id_tenant
WHERE 

SELECT invoice.invoice_type, 
	SUM(SELECT invoice.amount FROM invoice
        JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant=id_tenant
        WHERE invoice.payed='1') AS amount_payed,
	SUM(SELECT invoice.amount FROM invoice
        JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
        WHERE invoice.payed='0') AS amount_open,
    SUM(amount_payed - amount_open) AS saldo


/** VEEEERY Important **/

SELECT invoice.invoice_type AS invoice_type, (SELECT SUM(invoice.amount) FROM invoice
JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
WHERE tenant.id_tenant='1' AND invoice.payed='1' AND invoice.invoice_type=invoice_type)
FROM invoice
JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
WHERE tenant.id_tenant='1'
GROUP BY invoice.invoice_type

/** Invoice_type/amount_payed/amount_open **/

SELECT invoice.invoice_type AS invoice_type, 
(SELECT SUM(invoice.amount) FROM invoice
		JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
	WHERE tenant.id_tenant='1' AND invoice.payed='1' AND invoice.invoice_type="Miete") AS amount_payed,
(SELECT SUM(invoice.amount) FROM invoice
		JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
	WHERE tenant.id_tenant='1' AND invoice.payed='1' AND invoice.invoice_type="Miete") AS amount_open
FROM invoice
JOIN tenancy_agreement
        	ON invoice.id_tenancy_agreement=tenancy_agreement.id_tenancy_agreement
        JOIN tenant
        	ON tenancy_agreement.id_tenant=tenant.id_tenant
WHERE tenant.id_tenant='1' AND invoice.invoice_type="Miete"
GROUP BY invoice.invoice_type