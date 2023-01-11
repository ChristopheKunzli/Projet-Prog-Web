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

$invoke = "SELECT code FROM user_anwers_question WHERE user_id="+$usertag+" AND question_id="+$questiontag+" LIMIT 1;" 
$res = Invoke-SqlQuery $invoke
$res[0] | Out-File -FilePath .\Main.java -Encoding ASCII

echo $res

$Error.clear()

javac Main.java 

$Error | Out-File -FilePath .\error.txt

[String]$errorresult = Get-Content .\error.txt

java Main | Out-File -FilePath .\hello.txt

[String]$resoutput = Get-Content .\hello.txt

$query = "UPDATE user_anwers_question SET error_message ='" +$errorresult +"', program_output='"+$resoutput+"' WHERE user_id="+$usertag+" AND question_id="+$questiontag+" ;"

Invoke-SqlUpdate $query
