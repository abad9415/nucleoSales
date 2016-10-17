# aug/04/2016 17:23:52 by RouterOS 6.34.2
# software id = PVSW-WZBX
#
/interface bridge
add name=WAN
add name=lan
/interface ethernet
set [ find default-name=ether1 ] name=ether1..wan
set [ find default-name=ether5 ] advertise=\
    10M-half,10M-full,100M-half,100M-full name=ether5..Mikrowisp/Dude
/interface wireless
set [ find default-name=wlan1 ] antenna-gain=7 disabled=no frequency=2437 \
    mode=ap-bridge ssid=7RED
/interface vlan
add interface=lan name=vlan1 vlan-id=100
/interface wireless security-profiles
set [ find default=yes ] authentication-types=wpa-psk,wpa2-psk eap-methods="" \
    group-ciphers=tkip,aes-ccm mode=dynamic-keys supplicant-identity=MikroTik \
    unicast-ciphers=tkip,aes-ccm wpa-pre-shared-key=7R@soporte \
    wpa2-pre-shared-key=7R@soporte
/ip firewall layer7-protocol
add name=facebook regexp="^.+(facebook.com).*\$"
/ip pool
add name=dhcp_pool1 ranges=192.168.200.20-192.168.200.253
add name=dhcp_pool2 ranges=192.168.201.1-192.168.201.253
/ip dhcp-server
add address-pool=dhcp_pool1 disabled=no interface=lan name=dhcp1
/ppp profile
add bridge=lan local-address=192.168.200.254 name=externos remote-address=\
    dhcp_pool1
/queue simple
add disabled=yes max-limit=2M/2M name=queue2 target=192.168.200.0/24
add disabled=yes max-limit=256k/0 name=queue1 queue=default/default target=\
    192.168.200.162/32 total-queue=default
/system logging action
add name=remoto remote=189.201.242.28 target=remote
/interface bridge port
add bridge=lan interface=ether2
add bridge=WAN interface=ether3
add bridge=lan interface=ether4
add bridge=WAN interface=ether5..Mikrowisp/Dude
add bridge=lan interface=wlan1
add bridge=WAN interface=ether1..wan
/ip firewall connection tracking
set enabled=yes
/interface pptp-server server
set enabled=yes
/ip address
add address=189.201.242.28/28 interface=WAN network=189.201.242.16
add address=192.168.200.254/24 interface=lan network=192.168.200.0
add address=192.168.201.254/24 interface=lan network=192.168.201.0
/ip dhcp-server lease
add address=192.168.200.29 client-id=1:0:b:82:56:66:91 comment=\
    "extencion 113" mac-address=00:0B:82:56:66:91 server=dhcp1
add address=192.168.200.6 client-id=1:0:c0:ee:1a:68:28 comment=impresora \
    mac-address=00:C0:EE:1A:68:28 server=dhcp1
add address=192.168.200.43 always-broadcast=yes client-id=1:0:c:42:a3:6:cf \
    comment="mikrotik pruebas" mac-address=00:0C:42:A3:06:CF server=dhcp1
add address=192.168.200.55 always-broadcast=yes client-id=1:28:e3:47:f:1f:71 \
    comment=mauricio mac-address=28:E3:47:0F:1F:71 server=dhcp1
add address=192.168.200.21 client-id=1:24:da:9b:db:57:4c comment="cel jr" \
    mac-address=24:DA:9B:DB:57:4C server=dhcp1
add address=192.168.200.24 client-id=1:2:a2:43:9b:3e:7a comment="juan ramon" \
    mac-address=02:A2:43:9B:3E:7A server=dhcp1
add address=192.168.200.48 client-id=64:31:50:27:3E:3F mac-address=\
    64:31:50:27:3E:3F server=dhcp1
add address=192.168.200.134 always-broadcast=yes client-id=\
    1:28:d2:44:1a:9c:24 mac-address=28:D2:44:1A:9C:24 server=dhcp1
add address=192.168.200.39 client-id=1:ec:88:92:2a:33:cb comment="Cel MJ" \
    mac-address=EC:88:92:2A:33:CB server=dhcp1
add address=192.168.200.162 client-id=1:9c:4e:36:c5:cb:64 mac-address=\
    9C:4E:36:C5:CB:64 server=dhcp1
add address=192.168.200.44 client-id=1:c8:1f:66:c:55:71 comment=marcos \
    mac-address=C8:1F:66:0C:55:71 server=dhcp1
add address=192.168.200.122 client-id=1:20:16:d8:c1:9:19 mac-address=\
    20:16:D8:C1:09:19 server=dhcp1
add address=192.168.200.52 client-id=1:d4:be:d9:b7:eb:74 comment=\
    "Compu vnc soporte monitoreo" mac-address=D4:BE:D9:B7:EB:74 server=dhcp1
add address=192.168.200.40 client-id=1:8:3e:8e:5a:16:f7 comment=vic \
    mac-address=08:3E:8E:5A:16:F7 server=dhcp1
add address=192.168.200.47 client-id=1:60:be:b5:78:a4:bb mac-address=\
    60:BE:B5:78:A4:BB server=dhcp1
add address=192.168.200.50 client-id=1:48:51:b7:30:d8:88 mac-address=\
    48:51:B7:30:D8:88 server=dhcp1
add address=192.168.200.73 client-id=1:60:7e:dd:64:85:24 comment=\
    "jesus benitez" mac-address=60:7E:DD:64:85:24 server=dhcp1
add address=192.168.200.85 comment="juan angel" mac-address=08:28:15:65:AD:1C \
    server=dhcp1
/ip dhcp-server network
add address=192.168.200.0/24 dns-server=8.8.8.8,8.8.4.4 gateway=\
    192.168.200.254
/ip dns
set allow-remote-requests=yes servers=8.8.8.8,8.8.4.4
/ip firewall address-list
add address=192.168.200.10 list=abiertos
add address=192.168.200.24 list=abiertos
add address=192.168.200.55 list=abiertos
add address=192.168.200.21 list=abiertos
add address=192.168.200.134 list=abiertos
add address=192.168.200.39 list=abiertos
add address=192.168.200.162 list=abiertos
add address=192.168.200.122 list=abiertos
add address=192.168.200.51 list=abiertos
add address=192.168.200.40 list=abiertos
add address=192.168.200.192 list=abiertos
add address=192.168.200.25 list=abiertos
add address=192.168.200.47 list=abiertos
add address=192.168.200.50 list=abiertos
add address=192.168.200.73 list=abiertos
add address=192.168.200.85 list=abiertos
/ip firewall filter
add action=log chain=forward log-prefix=igmp>>> protocol=gre
add action=drop chain=input dst-address=189.201.242.28 dst-port=53 protocol=\
    udp
add action=drop chain=input dst-address=189.201.242.28 dst-port=22-23 \
    protocol=tcp
add chain=forward protocol=tcp src-address-list=abiertos
add chain=forward protocol=udp src-address-list=abiertos
add action=jump chain=forward jump-target=sinrestriccion protocol=udp \
    src-address-list=abiertos
add action=jump chain=forward jump-target=sinrestriccion protocol=tcp \
    src-address-list=abiertos
add action=add-src-to-address-list address-list=holacastigo \
    address-list-timeout=1m chain=forward comment="bloquea plugin hola vpn" \
    dst-port=6851 protocol=tcp
add action=add-src-to-address-list address-list=holacastigo \
    address-list-timeout=1m chain=forward comment="bloquea plugin hola vpn" \
    dst-port=6861 protocol=tcp
add action=drop chain=forward comment="bloquea plugin hola vpn" dst-port=80 \
    protocol=tcp src-address-list=holacastigo
add action=drop chain=forward comment="bloquea plugin hola vpn" dst-port=443 \
    protocol=tcp src-address-list=holacastigo
add action=drop chain=forward comment="bloquea facebook" dst-port=80 \
    layer7-protocol=facebook protocol=tcp src-address-list=!abiertos
add action=drop chain=forward comment="bloquea facebook" disabled=yes \
    layer7-protocol=facebook src-address-list=!abiertos
add action=drop chain=forward dst-port=443 layer7-protocol=facebook \
    log-prefix="facebook 443>>>" protocol=tcp src-address-list=!abiertos
add chain=sinrestriccion
add action=add-src-to-address-list address-list=spamm chain=forward comment=\
    spamm connection-limit=30,32 disabled=yes dst-port=787 limit=50,5:packet \
    protocol=tcp src-address=192.168.200.0/24
add action=add-src-to-address-list address-list=spamm chain=forward comment=\
    spamm connection-limit=30,32 disabled=yes dst-port=587 limit=50,5:packet \
    protocol=tcp src-address=192.168.200.0/24
add action=add-src-to-address-list address-list=spamm chain=forward comment=\
    spamm connection-limit=30,32 disabled=yes dst-port=25 limit=50,5:packet \
    protocol=tcp src-address=192.168.200.0/24
add action=drop chain=forward comment=spamm disabled=yes src-address-list=\
    spamm
/ip firewall nat
add action=redirect chain=dstnat disabled=yes dst-port=80 protocol=tcp \
    src-address=192.168.200.21 to-ports=8080
add action=dst-nat chain=dstnat comment="extencion ip" dst-address=\
    189.201.242.28 dst-port=7777 protocol=udp to-addresses=192.168.201.1 \
    to-ports=7777
add action=dst-nat chain=dstnat comment="extencion ip" dst-address=\
    189.201.242.28 dst-port=7777 protocol=tcp to-addresses=192.168.201.1 \
    to-ports=7777
add action=dst-nat chain=dstnat comment="pbx first contact" dst-address=\
    189.201.242.28 dst-port=5060 protocol=udp src-address=143.202.77.147 \
    to-addresses=192.168.201.1 to-ports=5060
add action=dst-nat chain=dstnat comment="pbx firstcontact" dst-address=\
    189.201.242.28 dst-port=5060 protocol=tcp src-address=143.202.77.147 \
    to-addresses=192.168.201.1 to-ports=5060
add action=dst-nat chain=dstnat dst-address=192.168.200.104 to-addresses=\
    192.168.201.1
add action=dst-nat chain=dstnat comment=unifi dst-address=189.201.242.28 \
    dst-port=8443 protocol=tcp to-addresses=189.201.242.19 to-ports=8443
add action=dst-nat chain=dstnat comment=unifi dst-address=189.201.242.28 \
    dst-port=8080 protocol=tcp to-addresses=189.201.242.19 to-ports=8080
add action=dst-nat chain=dstnat comment="maquina marcos" dst-address=\
    189.201.242.28 dst-port=6010 protocol=tcp to-addresses=192.168.200.44 \
    to-ports=6010
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=143 protocol=tcp to-addresses=192.168.200.52 to-ports=143
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=443 protocol=tcp to-addresses=192.168.200.52 to-ports=443
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=5222-5223 protocol=tcp to-addresses=192.168.200.52 to-ports=\
    5222-5223
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=995 protocol=tcp to-addresses=192.168.200.52 to-ports=995
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=110 protocol=tcp to-addresses=192.168.200.52 to-ports=110
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=993 protocol=tcp to-addresses=192.168.200.52 to-ports=993
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=465 protocol=tcp to-addresses=192.168.200.52 to-ports=465
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=80 protocol=tcp to-addresses=192.168.200.52 to-ports=81
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=25 protocol=tcp to-addresses=192.168.200.52 to-ports=25
add action=dst-nat chain=dstnat comment=desknow dst-address=189.201.242.28 \
    dst-port=787 protocol=tcp to-addresses=192.168.200.52 to-ports=787
add action=redirect chain=dstnat disabled=yes dst-port=53 protocol=udp
add action=dst-nat chain=dstnat comment=syslog dst-address=189.201.242.28 \
    dst-port=600 protocol=udp to-addresses=192.168.200.48 to-ports=600
add action=dst-nat chain=dstnat comment=syslog dst-address=189.201.242.28 \
    dst-port=600 protocol=tcp to-addresses=192.168.200.48 to-ports=514
add action=dst-nat chain=dstnat dst-address=189.201.242.28 dst-port=5900 \
    protocol=tcp to-addresses=192.168.200.10 to-ports=5900
add action=dst-nat chain=dstnat comment=vnc dst-address=189.201.242.28 \
    dst-port=5901 protocol=tcp to-addresses=10.1.5.2 to-ports=5901
add action=masquerade chain=srcnat
/ip proxy
set cache-on-disk=yes enabled=yes
/ip route
add distance=1 gateway=189.201.242.17
add distance=1 dst-address=189.201.242.19/32 gateway=189.201.242.17
add distance=1 dst-address=189.201.242.29/32 gateway=189.201.242.17
add distance=1 dst-address=192.168.100.0/24 gateway=192.168.200.43
/ip service
set ftp disabled=yes
set www disabled=yes
/ppp secret
add name=oscar password=7R@soporte profile=externos service=pptp
/system clock
set time-zone-name=America/Tijuana
/system identity
set name="Oficina RED7"
/system leds
set 5 interface=wlan1
