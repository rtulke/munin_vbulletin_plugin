<?php

/** small vbonline user by robert tulke **/

$specialtemplates = array(
        'userstats',
);

require_once('./global.php');
require_once(DIR . '/includes/functions_online.php');
$datecut = TIMENOW - $vbulletin->options['cookietimeout'];
$userscount = $db->query_read_slave("
	SELECT session.userid
	$countinvisible
	$hook_query_fields
	FROM " . TABLE_PREFIX . "session AS session
	$countjoin
	$hook_query_joins
	WHERE session.lastactivity > $datecut
	$hook_query_where
	$where
");

$count = array();
$numberinvisible = 0;

while ($user = $db->fetch_array($userscount))
{
	if (!$user['userid'])
	{
		$count['guests'][] = true;
	}
	else
	{
		$count['members'][$user['userid']] = true;

		if ($user['invisible'] AND $user['userid'] != $uid)
		{
			$numberinvisible++;
		}
	}
}

// Count self as a member if necessary.
if ($vbulletin->userinfo['userid'] AND $showmembers)
{
	$count['members'][$vbulletin->userinfo['userid']] = true;
}

$numberguests = sizeof($count['guests']);
$numbermembers = sizeof($count['members']);

// Add self as guest if necessary.
if (!$vbulletin->userinfo['userid'] AND !$numberguests
AND (($showguests AND !$showspiders) OR ($showguests AND $showmembers)))
{
	$numberguests++;
}

$totalonline = $numbermembers + $numberguests;
$numbervisible = $numbermembers - $numberinvisible;
$displaytotal = $numberguests + $numbervisible;
$members = vb_number_format($vbulletin->userstats['numbermembers']);

// print "guests: ".$numberguests." registed: ".$numbermembers." total: ".$displaytotal." all members: ".$members;
print $numberguests.";".$numbermembers.";".$displaytotal.";".$members;
?>
