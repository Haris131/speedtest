# speedtest
wget https://github.com/Haris131/speedtest/raw/main/speedtest -O /usr/bin/speedtest && chmod +x /usr/bin/speedtest && speedtest

# badvpn-tun2socks
wget https://github.com/Haris131/speedtest/raw/main/badvpn-tun2socks -O /usr/bin/badvpn-tun2socks && chmod +x /usr/bin/badvpn-tun2socks && badvpn-tun2socks

# banned & unbanned wifi
1. opkg update &&  opkg install iwinfo
2. wget https://raw.githubusercontent.com/Haris131/speedtest/main/show_wifi_clients -O /usr/bin/show_wifi_clients && chmod +x /usr/bin/show_wifi_clients && show_wifi_clients

# coreutils-base64_8.32-6_aarch64_cortex-a53.ipk
wget https://github.com/Haris131/speedtest/raw/main/coreutils-base64_8.32-6_aarch64_cortex-a53.ipk && opkg install *.ipk && rm *.ipk

# v2ray-core_4.34.0-1_aarch64_cortex-a53.ipk
wget https://github.com/Haris131/speedtest/raw/main/v2ray-core_4.34.0-1_aarch64_cortex-a53.ipk && opkg install *.ipk && rm *.ipk
