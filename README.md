# munin_vbulletin_plugin
generate a munin graph from vbulletin forum (total users online, guests, registered online users)

## installation

* aptitude install munin
* copy vbuseronline-plugin to /usr/share/munin/plugins/
* chmod 755 /usr/share/munin/plugins/vbuseronline-plugin
* ln -s /usr/share/munin/plugins/vbuseronline-plugin /etc/munin/plugins/vbuseronline-plugin
