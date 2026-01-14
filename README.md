# Snipe2ools
Snipe2ools (internally referred to as SnipeTools) is a sister tool to the ChromebookSolution project for my place of internship. It is heavily built off of the project SnipeTools (internally referred to as SummerTools). It's designed to make various API calls to both an internally hosted deployment of the Snipe IT asset management platform as well as Google Admin to update the statuses of Chromebooks.

### Notice
IMPORTANT! If you get a PHP error about a self-signed certificate with cURL, follow this guide https://php.watch/articles/php-curl-windows-cainfo-fix.
The cacert.pm file is a file that contains many root CAs. Without it, cURL has no source to validate any certs with and will throw an error.
cURL is used somewhere in a dependency to make API calls.

## Naming Convention
https://github.com/csquinn/snipetools was developed in the Summer of 2025 as an all-encompassing tool for Snipe IT asset management. While it's functional and still in place in the district, it is only used by a few employees due to its complexity. Snipe2ools was developed to make similar API calls to SnipeTools, but to remove many elements of choice that users had in the process. This was done to simplify the tool into a form that was more easily usable. To minimize more complexity at my place of internship, this new suite of simple tools adopted the original "SnipeTools" name, and the original, complex tools were renamed "SummerTools," as they are largely used by summer substitute technicians.

## Tool Breakdown
There are 5 tools present in Snipe2ools

1. Return Broken Chromebooks to Office
   - Sets Chromebook's location to the office and status to "broken" (should already be set as such)
2. Bring Working Chromebooks to Schools
   - Sets Chromebook's location to whatever school is specified and status to "ready to deploy"
3. Send Chromebook Out For Repair
   - Sets Chromebook's location to "In Transit" and status to "out for repair"
4. Mark Chromebook as Repaired
   - Sets Chromebook's location to the office and status to "ready to deploy"
5. Deprovision a Chromebook
   - Sets Chromebook's location to Elderton High (storage), status to "deprovisioned," and deprovisions the asset on Google Admin

All of the tools have an option to crossreference Google Admin and ensure the scanned Chromebook is enrolled (except for deprovision which purposefully unenrolls them)

## Technical Breakdown
This is a very brief technical explanation, as thorough documentation is currently outside of this project's scope. This is copied from the SnipeTools repo

Each of the tools work in a similar way

1. Each tool can be accessed from the SnipeTools homepage
2. Each tool is run from a simple php file (brokenToOffice.php, workingToSchools.php, outForRepair.php, repaired.php, deprovisioned.php) that hosts an html form designed to get an asset's serial number.
3. Those html forms then send a get request to a php file that is strictly for api calls (brokenToOfficeAPI.php, workingToSchoolsAPI.php, outForRepairAPI.php, repairedAPI.php, deprovisionedAPI.php)
4. The api call php files each "include" getIDBySerial.php. This php feature basically means that the contents of getIDBySerial.php are copy pasted on top of the three api php files. This is to eliminate redundancy
5. getIDBySerial.php then sends an API call to Snipe IT and Google to get an asset's internal Snipe ID and Google ID based on its serial number.
6. If the asset doesn't exist, the user is routed back to the original tool php page with a failure message. Otherwise, the logic continues.
7. These api php files (validateAPI.php, officeAPI.php, and deprovisionAPI.php) perform one or more api calls to Snipe IT and Google to update the asset.
8. Then, the user is routed back to the original tool php page with a success message. The html form is autofocused, meaning that the user can immediately begin typing or scanning the next asset.
