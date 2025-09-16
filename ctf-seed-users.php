<?php
/**
 * Plugin Name: CTF Seed Users (Lab Only)
 * Description: Tạo user "yếu" cho mục đích lab/CTF và cho phép rotate password từ admin. CHỈ DÙNG TRONG MÔI TRƯỜNG KIỂM THỬ.
 * Version: 1.0.0
 * Author: HuyQA (Template)
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * ---- CONFIG: paste your username & password lists here ----
 * You can replace/extend these arrays with your full lists.
 * (I put the lists you provided — keep them only for lab.)
 */
function ctf_get_usernames() {
    return array_map( 'trim', explode("\n", trim(<<<'USERNAMES'
info
admin
2000
michael
NULL
john
david
robert
chris
mike
dave
richard
123456
thomas
steve
mark
andrew
daniel
george
paul
charlie
dragon
james
qwerty
martin
master
pussy
mail
charles
bill
patrick
1234
peter
shadow
johnny
hunter
carlos
black
jason
tarrant
alex
brian
steven
scott
edward
joseph
12345
matthew
justin
natasha
hammer
anthony
harley
jack
dallas
dennis
cameron
gary
fuck
monkey
webmaster
mustang
ranger
kevin
jordan
frank
jeremy
captain
billy
jeff
freddy
cowboy
sales
matt
mickey
eric
tony
sexy
jennifer
joshua
123
killer
dick
spider
superman
iceman
brandon
jackson
jeffrey
bob
calvin
little
scotty
darren
donald
buster
root
fred
timothy
sparky
snoopy
philip
net
general
coffee
letmein
contact
love
badboy
kenneth
stephen
greg
blue
bigdog
super
boomer
amateur
bigdaddy
gregory
nathan
batman
fuckme
junior
phoenix
scooter
merlin
austin
doctor
football
chicago
ronald
maverick
casper
happy
purple
golden
12345678
andy
player
tigger
chicken
adam
stuart
dakota
robbie
prince
falcon
bigdick
rocket
marcus
tiger
orange
rabbit
hello
dan
cookie
albert
roberto
morgan
markus
douglas
simon
pass
chuck
angel
ronnie
rick
miller
barney
sex
lucky
rodney
larry
tom
curtis
scooby
nick
Michael
big
roland
alan
1111
knight
free
bitch
skippy
porsche
phil
allston
phantom
fucker
Robert
bobby
amanda
USERNAMES
    )));
}

function ctf_get_passwords() {
    return array_map( 'trim', explode("\n", trim(<<<'PASSWORDS'
123456
123456789
123123
111111
anhyeuem
1234567
0123456789
0123456
12345678
000000
asdasd
25251325
1234567890
121212
123321
zxcvbnm
qweqwe
456789
112233
aaaaaa
123123123
987654321
11111111
qwerty
147258369
maiyeuem
123qwe
654321
iloveyou
123654
999999
qqqqqq
1111111
147258
hota407
anhtuan
222222
159753
11223344
anhnhoem
anh123
159357
qwertyuiop
asd123
0987654321
emyeuanh
mmmmmm
012345
666666
anhanh
123789
phuong
111222
qweasd
hanoiyeudau
nguyen
789456
1111111111
mylove
789456123
19001560
qwe123
asdfghjkl
pppppp
anhhung
1234560
abc123
maiyeu
123456a
zzzzzz
quangninh
987654
555555
tuananh
asasas
asdfgh
zxcvbn
321321
tinhyeu
147852369
456123
matkhau
147852
12345678910
thienthan
anhyeu
111111111
toilatoi
10cham0
0147258369
456456
khongbiet
789789
a123456
333333
888888
123654789
truong
maimaiyeuem
hhhhhh
12345
zxczxc
yankee
741852963
maimai
properties
loveyou
thanhtung
hoanganh
0000000000
01230123
778899
anhdung
010203
123456987
abcd@1234
234567
anhmaiyeuem
handoi
222333
yeuanh
9876543210
anhday
999999999
123456123
12341234
thanh123
0902166970
321654
147147
ngocanh
nhoemnhieu
090909
phuoclapmx
"      "
nolove
thanhbinh
anhduc
concac
qazwsx
777777
hahaha
hung123
asdasdasd
101010
0000000
anhnam
tttttt
thuong
00000000
huy123
mnbvcxz
anhcuong
123456q
ssssss
anhyeuem123
098765
lalala
llllll
nnnnnn
anhthanh
yeuemnhieu
aaaaaaa
7777777
010101
huyhuy
kkkkkk
444444
11111111111111111111111111111
hoilamgi
anhthang
bbbbbb
chandoi
0147852369
tuan123
123asd
toiyeuem
anhhai
vietnam
hoailam
tinhlagi
113113
qwertyu
741852
maiyeuanh
1234566
thanhtam
thanhlong
anhthu
123465
forever
12344321
nam123
anhduy
thuylinh
lovely
ANHYEUEM
88888888
123456123456
anhvaem
oooooo
thanhcong
123457
anhquan
anhiuem
123789456
142536
thanhthuy
kiepdoden
123abc
tinhban
12345679
thanhthanh
001101
long123
hanhphuc
bigbang
01234567
dat123
1234568
123456789123456789
kimngan278
1234569
963852741
123456789a
lovelove
1234561
anhson
minh123
anhminh
hoang123
anhhuy
lonmemay
hunghung
ngocanh89
minhanh
huyhoang
thang123
124578
a
aspirine
1234512345
thanhthao
ngoctan
linh123
852456
hieu123
anhnhoemnhieu
minhminh
trung123
1234554321
nuttertools
heocon
linhlinh
123456789123
thuytrang
quynhanh
thanhnhan
qwqwqw
minhtuan
321654987
111222333
anhyeuem1
trunghieu
khongco
ppppppp
comchay+
0147258
hoanglong
thuthuy
meocon
anhdat
minhduc
0123654
0123654789
zxzxzx
kimngan
aaaaaaaa
khanh123
kimanh
hunter17051990
vananh
khongnho
meoghe
anhduong
piaggio15119
nhoemyeu3101
thanhtuan
qqqqqqq
thanhdat
gggggg
12121212
chiyeuminhem
tung123
cuong123
cccccc
phuonganh
0123123
121111
anhyeuemnhieu
dddddd
hoahong
0147852
000000000
246357
zxc123
456789123
012345678
01234567890
saobang
thienlong
son123
123123q
thanhnam
vvvvvv
namnam
1230123
19001570
thuyduong
hai123
qwertyui
thutrang
anhkhoa
2222222
langtu
123456aa
23456789
abc123456
0918273645
doilathe
ducanh
1122334455
123
vietanh
phuongthao
a123456789
369258147
9999999999
lamgithe99
babylove
Fantasy88
dung123
1231234
102030
thanhtrung
thuytien
qweqweqwe
binhminh
quanghuy
1234567899
qweasdzxc
haiyen
PASSWORDS
    )));
}

/**
 * Admin menu & page
 */
add_action('admin_menu', function(){
    add_submenu_page(
        'tools.php',
        'CTF Seed Users',
        'CTF Seed Users',
        'manage_options',
        'ctf-seed-users',
        'ctf_seed_users_admin_page'
    );
});

/**
 * Render admin page
 */
function ctf_seed_users_admin_page() {
    if (! current_user_can('manage_options') ) {
        wp_die('Insufficient permissions');
    }

    // handle actions
    if ( isset($_POST['ctf_action']) && check_admin_referer('ctf_seed_action','ctf_seed_nonce') ) {
        $action = sanitize_text_field($_POST['ctf_action']);
        if ($action === 'seed') {
            $report = ctf_seed_users();
        } elseif ($action === 'rotate') {
            $report = ctf_rotate_passwords();
        } else {
            $report = 'Unknown action';
        }
    } else {
        $report = '';
    }

    ?>
    <div class="wrap">
        <h1>CTF Seed Users (Lab only)</h1>
        <p><strong>WARNING:</strong> Chỉ dùng trên môi trường lab/sandbox mà bạn sở hữu. Không dùng trên site production.</p>

        <form method="post">
            <?php wp_nonce_field('ctf_seed_action','ctf_seed_nonce'); ?>
            <p>
                <button class="button button-primary" name="ctf_action" value="seed" type="submit">Seed Users (Tạo users nếu chưa tồn tại)</button>
                <button class="button" name="ctf_action" value="rotate" type="submit">Rotate Passwords (Đổi mật khẩu cho users đã seed)</button>
            </p>
        </form>

        <?php if($report): ?>
            <h2>Report</h2>
            <pre><?php echo esc_html( $report ); ?></pre>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Create users from list if not exists. Mark them via usermeta 'ctf_seeded' => 1
 */
function ctf_seed_users() {
    $usernames = ctf_get_usernames();
    $passwords = ctf_get_passwords();
    $created = $skipped = [];

    foreach ($usernames as $uname_raw) {
        $uname = sanitize_user( $uname_raw, true );
        if ( empty($uname) ) continue;

        if ( username_exists( $uname ) || email_exists( $uname . '@example.local' ) ) {
            $skipped[] = $uname;
            continue;
        }

        // choose a random initial password from list
        $pw = $passwords[array_rand($passwords)];
        if ($pw === '') $pw = wp_generate_password(12);

        // set an email placeholder to satisfy WP user creation
        $email = is_email( $uname . '@example.local' ) ? ( $uname . '@example.local' ) : uniqid($uname).'@example.local';

        $user_id = wp_create_user( $uname, $pw, $email );
        if ( is_wp_error($user_id) ) {
            $skipped[] = $uname . ' (error: ' . $user_id->get_error_message() . ')';
            continue;
        }

        // mark seeded and store the current password in usermeta (ONLY for lab; don't do this in prod)
        update_user_meta( $user_id, 'ctf_seeded', 1 );
        update_user_meta( $user_id, 'ctf_seeded_password', wp_hash_password($pw) ); // hashed storage to hint it's sensitive
        $created[] = $uname;
    }

    $report = "Created: " . count($created) . " users\n";
    if ($created) $report .= implode(", ", $created) . "\n";
    $report .= "Skipped/Existing: " . count($skipped) . "\n";
    if ($skipped) $report .= implode(", ", $skipped) . "\n";
    $report .= "Note: initial passwords chosen randomly from provided list. Check your lab login flow.";
    return $report;
}

/**
 * Rotate passwords for users that were seeded (usermeta 'ctf_seeded' == 1).
 */
function ctf_rotate_passwords() {
    $passwords = ctf_get_passwords();
    $args = array(
        'meta_key' => 'ctf_seeded',
        'meta_value' => '1',
        'number' => 0,
        'fields' => array('ID','user_login'),
    );
    $users = get_users($args);
    $changed = $failed = [];

    foreach ($users as $u) {
        $new_pw = $passwords[array_rand($passwords)];
        if ($new_pw === '') $new_pw = wp_generate_password(12);

        // set password
        wp_set_password( $new_pw, $u->ID ); // this will log out that user sessions
        // store hashed password in usermeta for lab reference (again: only lab)
        update_user_meta( $u->ID, 'ctf_seeded_password', wp_hash_password($new_pw) );
        $changed[] = $u->user_login;
    }

    $report = "Rotated passwords for " . count($changed) . " users\n";
    if ($changed) $report .= implode(", ", $changed) . "\n";
    $report .= "Note: wp_set_password invalidates existing sessions for those users.";
    return $report;
}

/**
 * Clean up on uninstall: optional (commented out)
 */
/*
register_uninstall_hook(__FILE__, function(){
    $usernames = ctf_get_usernames();
    foreach ($usernames as $uname_raw) {
        $uname = sanitize_user($uname_raw, true);
        if (!$uname) continue;
        $user = get_user_by('login', $uname);
        if ($user) {
            wp_delete_user( $user->ID );
        }
    }
});
*/
