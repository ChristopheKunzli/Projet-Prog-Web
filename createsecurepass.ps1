
cd C:\ProjetWeb

$Credentials = Get-Credential
$Credentials.Password | ConvertFrom-SecureString | Set-Content password.txt