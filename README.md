<h2>Tribore Health Web Application</h2>
<p>To get started follow the steps below</p>
Make sure you have sql installed in your pc as well as node.

1. Unzip the project
2. Copy the .env.example file into the .env file.
3. Create a database add the relevant database fields
4. Run composer install
5. Run npm install and npm run dev
6. Run php artian key:generate
7. Run php artisan passport:keys
8. Run php artisan migrate:fresh --seed
8. Run php artisan serve and use that server

For MPESA and TWILIO use this in your .env file
MPESA_CONSUMER_KEY= "pn8irnZe2lA4w3nfaYFQ4HimmnLab8Vb"
MPESA_CONSUMER_SECRET="fWGrnaDJrd8oZdPG"
MPESA_SUBDOMAIN="sandbox"
BUSINESS_SHORT_CODE = "174379"
LIPA_NA_MPESA_PASSKEY = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919"
TRANSACTION_TYPE = "CustomerPayBillOnline"
ACCOUNT_REFERENCE = "Tribore Health"
TRANSACTION_DESCRIPTION = "Doctor Appointment Fees"
REMARKS = "Thank you for choosing Tribore Health"
CALLBACK_URL = "http://darajambili.herokuapp.com/express-payment"

TWILIO_ACCOUNT_SID=ACc59bd63c0816e522878b6049ffd4e9fa
TWILIO_AUTH_TOKEN=83b8cc6d3b9a3cb02ceeccdddeea71a3
TWILIO_NUMBER=+16613024159
TWILIO_APPLICATION_SID=AP76045b1d9076a1a3ae968c1f8f6d1bda
TWILIO_API_KEY_SID=SKe85c705650c887f46968f29dbbac7a8d
TWILIO_API_KEY_SECRET=zNmbFrkqtCg2zqb3uyZzD5iGhSqvIenG