<php?
// Generate the report bill and output it as a PDF
$report_bill = generate_report_bill();
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="report_bill.pdf"');
echo $report_bill;
?>