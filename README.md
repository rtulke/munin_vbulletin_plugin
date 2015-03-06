# munin_vbulletin_plugin
generate a munin graph from vbulletin forum (total users online, guests, registered online users)

## installation

* aptitude install munin
* mv vbuseronline-plugin vbuseronline
* cp vbuseronline to /usr/share/munin/plugins/
* chmod 755 /usr/share/munin/plugins/vbuseronline
* ln -s /usr/share/munin/plugins/vbuseronline /etc/munin/plugins/vbuseronline
* copy online1.php to your vbulletin website root directory (example: /var/www/mydomain.com/forum/)
* vim /usr/share/munin/plugins/vbuseronline 
** change URL
* /etc/init.d/munin restart

The online1.php must be accessible by a web browser, the vbuseronline-plugin Script connect a URL!
