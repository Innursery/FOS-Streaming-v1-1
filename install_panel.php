<?php

$we_root = trim(shell_exec("whoami"));
if (strcmp($we_root, "root") !== 0) {
    echo "Please execute this script as root! Exitting...";
    exit;
}

echo "FOS: Checking for existing installations!\r";
shell_exec("killall -9 ffmpeg php5-fpm php-fpm nginx nginx_fos > /dev/null");
shell_exec("service php5-fpm stop > /dev/null");
shell_exec("rm -rf /usr/src/FOS-Streaming/* > /dev/null");
shell_exec("rm -rf /usr/src/FOS-Streaming/./.* > /dev/null");
shell_exec("umount /home/fos-streaming/fos/streams > /dev/null");
shell_exec("umount /home/fos-streaming/fos/www/cache > /dev/null");
shell_exec("rm -rf /home/fos-streaming > /dev/null");
shell_exec("deluser fosstreaming -q");
shell_exec("delgroup fosstreaming -q");

function InstallSources($CodeName) {
    echo "FOS: Sources ($CodeName)...\n";
    switch ($CodeName) {
        case 'wheezy':
            shell_exec("echo 'deb http://ftp.de.debian.org/debian stable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.de.debian.org/debian stable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ wheezy-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ wheezy-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ wheezy/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ wheezy/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'squeeze':
            shell_exec("echo 'deb http://archive.debian.org/debian oldstable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.debian.org/debian oldstable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ squeeze-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ squeeze-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ squeeze/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ squeeze/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case "jessie":
            shell_exec("echo 'deb http://ftp.fr.debian.org/debian testing main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.fr.debian.org/debian testing main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ jessie-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ jessie-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ jessie/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ jessie/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case "sid":
            shell_exec("echo 'deb http://ftp.us.debian.org/debian unstable main contrib non-free' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.us.debian.org/debian unstable main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://ftp.debian.org/debian/ Sid-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://ftp.debian.org/debian/ Sid-updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://security.debian.org/ Sid/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://security.debian.org/ Sid/updates main contrib non-free' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'trusty':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ trusty-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ trusty-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'utopic':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ utopic-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ utopic-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;

        case 'saucy':
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy main restricted universe multiverse' > /etc/apt/sources.list.d/fos_streaming.list'");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ saucy-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ saucy-backports main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        case "wily":
            shell_exec("echo '###### Ubuntu Main Repos' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Update Repos' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-security main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-updates main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ wily-proposed main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-security main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-updates main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ wily-proposed main restricted universe multiverse ' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Partner Repo' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://archive.canonical.com/ubuntu wily partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.canonical.com/ubuntu wily partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        case "vivid":
            shell_exec("echo '###### Ubuntu Main Repos' > /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Update Repos' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://us.archive.ubuntu.com/ubuntu/ vivid-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-security main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-updates main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://us.archive.ubuntu.com/ubuntu/ vivid-proposed main restricted universe multiverse' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo '###### Ubuntu Partner Repo' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb http://archive.canonical.com/ubuntu vivid partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            shell_exec("echo 'deb-src http://archive.canonical.com/ubuntu vivid partner' >> /etc/apt/sources.list.d/fos_streaming.list");
            break;
        
        default:
            return true;
    }
    return true;
}

$release_info = shell_exec("lsb_release -i -s");
$arch = shell_exec("uname -m");
echo "Welcome \n";
echo "FOS-Streaming will be installed on your system \n";
echo "Please don't close this session until it's finished \n \n";
echo "1. [Distribution Detection:] ";
echo " [############";

if (strcmp($release_info, "Ubuntu") || strcmp($release_info, "Debian")) {
    echo "]PASS \n";
    $CodeName = trim(strtolower(shell_exec('lsb_release -c -s')));
    if (!file_exists("/etc/apt/sources.list.d/fos_streaming.list")) {
        InstallSources($CodeName);
    }
    echo "Updating newly added sources, please hold...";
    shell_exec("apt-get update > /dev/null");
} else {
    echo "]FAIL. Need Ubuntu or Debian!!! \n";
    exit();
}

shell_exec("/usr/sbin/useradd -s /sbin/nologin -U -d /home/fos-streaming -m fosstreaming");

shell_exec("mkdir /home/fos-streaming/fos");
shell_exec("mkdir /home/fos-streaming/fos/www");


if (!file_exists("/usr/src/FOS-Streaming")) {
    shell_exec("mkdir /usr/src/FOS-Streaming");
}


echo "## \n";

function GetFos() {
    shell_exec("rm -rf /usr/src/FOS-Streaming/*");
    shell_exec("git clone https://github.com/Innursery/FOS-Streaming-v1-1.git /usr/src/FOS-Streaming/ > /dev/null");
    shell_exec("mv /usr/src/FOS-Streaming/* /home/fos-streaming/fos/www/  > /dev/null");
    if (!file_exists("/usr/bin/composer.phar")) {
        shell_exec("wget https://getcomposer.org/installer -O /tmp/installer  > /dev/null");
        shell_exec("/usr/bin/php /tmp/installer --quiet");
        shell_exec("/bin/cp /tmp/composer.phar /usr/bin/composer.phar  > /dev/null");
    }
    shell_exec("chmod +x /usr/bin/composer.phar");
    shell_exec("/usr/bin/composer.phar install -d /home/fos-streaming/fos/www/ --quiet");
}

function AddSudo() {
    $ffmpeg_sudo = shell_exec("cat /etc/sudoers | grep -v grep | grep -c 'ffmpeg'");
    if ($ffmpeg_sudo == 0) {
        shell_exec("echo 'fosstreaming ALL = (root) NOPASSWD: /usr/local/bin/ffmpeg' >> /etc/sudoers");
        shell_exec("echo 'fosstreaming ALL = (root) NOPASSWD: /usr/local/bin/ffprobe' >> /etc/sudoers");
        shell_exec("echo '*/2 * * * * fosstreaming /usr/bin/php /home/fos-streaming/fos/www/cron.php' >> /etc/crontab");
    }
}

function AddRCLocal() {
    shell_exec("sed --in-place '/exit 0/d' /etc/rc.local");
    $nginx_bin = shell_exec("cat /etc/rc.local | grep -v grep | grep -c 'nginx_fos'");
    if ($nginx_bin == 0) {
        shell_exec("echo '/home/fos-streaming/fos/nginx/sbin/nginx_fos' >> /etc/rc.local");
    }
    $phpfpm_bin = shell_exec("cat /etc/rc.local | grep -v grep | grep -c 'php-fpm'");
    if ($phpfpm_bin == 0) {
        shell_exec("echo '/home/fos-streaming/fos/php/sbin/php-fpm' >> /etc/rc.local");
    }
    shell_exec("echo 'sleep 10' >> /etc/rc.local");
    shell_exec("echo 'exit 0' >> /etc/rc.local");
}

function BuildWeb() {
    if (!file_exists("/home/fos-streaming/fos/www/cache")) {
        shell_exec("mkdir /home/fos-streaming/fos/www/cache");
    }
    if (!file_exists("/home/fos-streaming/fos/streams")) {
        shell_exec("mkdir /home/fos-streaming/fos/streams");
    }


    $fstab_streams = shell_exec("cat /etc/fstab | grep -v grep | grep -c 'fos-streaming/fos/streams'");
    if ($fstab_streams == 0) {
        shell_exec("echo 'tmpfs /home/fos-streaming/fos/streams tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=85% 0 0' >> /etc/fstab");
    }

    $fstab_cache = shell_exec("cat /etc/fstab | grep -v grep | grep -c 'fos-streaming/fos/www/cache'");
    if ($fstab_cache == 0) {

        shell_exec("echo 'tmpfs /home/fos-streaming/fos/www/cache tmpfs defaults,noatime,nosuid,nodev,noexec,mode=1777,size=500M 0 0' >> /etc/fstab");
    }
    shell_exec("chown -R fosstreaming:fosstreaming /home/fos-streaming");
    shell_exec("/home/fos-streaming/fos/php/sbin/php-fpm");
    shell_exec("/home/fos-streaming/fos/nginx/sbin/nginx_fos");
}

function GetFOSResources($arch) {
    if (stristr($arch, '64')) {
        $fos = "fos-streaming_unpack_x84_64.tar.gz";
    } else {
        $fos = "fos-streaming_unpack_i686.tar.gz";
    }
    shell_exec("wget http://fos-streaming.com/{$fos} -O /home/fos-streaming/{$fos} > /dev/null");
    shell_exec("tar -xzf /home/fos-streaming/{$fos} -C /home/fos-streaming/ > /dev/null");
}

function GetIP() {
    $ip_address = explode("\n", shell_exec("/sbin/ifconfig | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'"));

    foreach ($ip_address as $addr) {
        if (strncmp("127", $addr, 3) !== 0) {
            $result = $addr;
            break;
        }
    }
    return $result;
}


echo "3. [Installing needed files:]";
echo " [#";
shell_exec("apt-get install -y --force-yes libxml2-dev  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libbz2-dev  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libcurl4-openssl-dev   > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libmcrypt-dev  > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libmhash2 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libmhash-dev  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpcre3  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpcre3-dev  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes make  > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes build-essential  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxslt1-dev git > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libssl-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes git > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes php5.6  > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes unzip > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes python-software-properties > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpopt0 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpq-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpq5 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpspell-dev > /dev/null 2>&1");
echo "#";
#shell_exec("alias php='/home/fos-streaming/fos/php/bin/php");
shell_exec("apt-get install -y --force-yes libpthread-stubs0-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libpython-stdlib > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libqdbm-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libqdbm14 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libquadmath0 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes librecode-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes librecode0 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes librtmp-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes librtmp0 > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libsasl2-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsasl2-modules > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsctp-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsctp1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsensors4 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsensors4-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsm-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsm6 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsnmp-base > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsnmp-dev > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libsnmp-perl > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsnmp30 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libsqlite3-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libssh2-1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libssh2-1-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libssl-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libstdc++-4.8-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libstdc++6-4.7-dev > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libsybdb5 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtasn1-3-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtasn1-6-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libterm-readkey-perl > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtidy-0.99-0 > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libtidy-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtiff5 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtiff5-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtiffxx5 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtimedate-perl > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtinfo-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtool > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libtsan0 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libunistring0 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libvpx-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libvpx1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libwrap0-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libx11-6 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libx11-data > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libx11-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxau-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxau6 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxcb1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxcb1-dev > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes libxdmcp-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxdmcp6 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxml2 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxml2-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxmltok1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxmltok1-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxpm-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxpm4 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxslt1-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxslt1.1 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxt-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes libxt6 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes linux-libc-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes m4 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes make > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes man-db > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes netcat-openbsd > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes odbcinst1debian2 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes openssl > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes patch > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes pkg-config > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes po-debconf > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes python > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes python-minimal > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes python2.7 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes python2.7-minimal > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes re2c > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes unixodbc > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes unixodbc-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes uuid-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes x11-common > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes x11proto-core-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes x11proto-input-dev > /dev/null 2>&1");
echo "#";
shell_exec("apt-get install -y --force-yes x11proto-kb-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes xorg-sgml-doctools > /dev/null 2>&1");
shell_exec("apt-get install -y libjpeg8 > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes xtrans-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes zlib1g-dev > /dev/null 2>&1");
shell_exec("apt-get install -y --force-yes php5.6-fpm  > /dev/null 2>&1");
echo "]PASS \n";


echo "4. [FOS-Panel Installation:] ";
echo " [#";

$srv_ip = GetIP();
GetFOSResources($arch);
echo "##";
GetFos();
echo "#";
AddSudo();
echo "#";
AddRCLocal();
echo "#";
BuildWeb();
echo "##";
echo "#";
shell_exec("chown fosstreaming:fosstreaming /home/fos-streaming/fos/nginx/html");
echo "#";
echo "]PASS \n";
echo "******************************************************************************************** \n";
echo "FOS-Streaming installed.. \n";
echo "visit management page: 'http://{$srv_ip}:8000' \n";
echo "Login: \n";
echo "Username: admin \n";
echo "Password: admin \n";
echo "IMPORTANT: After you logged in, go to settings and check your ip-address. \n";
echo "******************************************************************************************** \n";
