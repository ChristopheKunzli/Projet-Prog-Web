param(
        [Parameter(Position=0,mandatory=$true)]
        [string] $usertag,
        [Parameter(Position=1,mandatory=$true)]
        [string] $questiontag)


Import-Module simplySql



cd C:\ProjetWeb
$Username = "admin_leakcode"
$Password = Get-Content “password.txt” | ConvertTo-SecureString
$Credentials = New-Object System.Management.Automation.PSCredential $Username,$Password
Import-Module simplySql

Open-MySqlConnection -Server "localhost" -database "leakcode" -Credential $Credentials

$invoke = "SELECT code, id FROM user_anwers_question WHERE user_id="+$usertag+" AND question_id="+$questiontag+" ORDER BY id desc LIMIT 1 ;"

$res = Invoke-SqlQuery $invoke

$invoke = "SELECT powershell_input, id FROM example WHERE question_id="+$questiontag+" ;"

$examples = Invoke-SqlQuery $invoke

foreach ($example in $examples){

$code = $res[0] -replace '"exemple input"',$example[0]


$code | Out-File -FilePath .\Main.java -Encoding ASCII

$Error.clear()

javac Main.java

$Error | Out-File -FilePath .\error.txt

[String]$errorresult = Get-Content .\error.txt

Remove-Item .\error.txt

java Main | Out-File -FilePath .\hello.txt

[String]$resoutput = Get-Content .\hello.txt

Remove-Item .\hello.txt

$query = "INSERT INTO user_anwers_example (user_anwers_question_id, example_id, error, output) VALUES ("+ $res[1] +", "+ $example[1] +",'" +$errorresult +"','"+$resoutput+"');"

Invoke-SqlUpdate $query

}