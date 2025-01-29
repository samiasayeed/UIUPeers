create database uiupeers;
use uiupeers;

create table users(
	userid int primary key auto_increment,
    username varchar(100),
    phone varchar(15),
    email varchar(100),
    job varchar(50),
    university_id varchar(15),
    department varchar(5),
    id_card_img varchar(200),
    approve bool,
    password varchar(32)
);

insert into users
(username, job, university_id, password,approve)
values
('admin', 'A', '000000', '1234', true);

create table booksdetail(
	book_id int primary key auto_increment,
    title varchar(200),
    author varchar(100),
    description varchar(1000),
    price int default 0,
    image varchar(100),
    posted_by int,
    postDate date,
    CONSTRAINT FK_booksdetail_users FOREIGN KEY (posted_by)
    REFERENCES users(userid)
);

create table exchangedOrSold(
	id int primary key auto_increment,
    userid int,
    book_id int,
    details varchar(20),
    enddate date,
    CONSTRAINT FK_exchangedOrSold_users FOREIGN KEY (userid)
    REFERENCES users(userid),
    CONSTRAINT FK_exchangedOrSold_booksdetail FOREIGN KEY (book_id)
    REFERENCES booksdetail(book_id)
);

create table faculty(
	faculty_id int primary key auto_increment,
    f_name varchar(100),
    f_email varchar(100),
    f_position varchar(100),
    department varchar(300),
    profile_image varchar(100)
);

create table facultyReview(
	review_id int primary key auto_increment,
    faculty_id int,
    rating int,
    teaching_method int,
    communication_skill int,
    availability int,
    take_feedback int,
    supportive int,
    marking int,
    rated_by int,
    CONSTRAINT FK_facultyReview_faculty FOREIGN KEY (faculty_id)
    REFERENCES faculty(faculty_id),
    CONSTRAINT FK_facultyReview_users FOREIGN KEY (rated_by)
    REFERENCES users(userid)
);


create table course(
	c_id int primary key auto_increment,
    c_name varchar(100),
    c_code varchar(20),
    department varchar(20),
    creditHour int,
    prereq varchar(50),
    c_description varchar(1000)
);


create table courseReview(
	r_id int primary key auto_increment,
    course_id int,
    comment varchar(100),
    reviewed_by int,
    CONSTRAINT FK_courseReview_users FOREIGN KEY (reviewed_by)
    REFERENCES users(userid),
    CONSTRAINT FK_courseReview_course FOREIGN KEY (course_id)
    REFERENCES course(c_id)
);


create table foodServices (
	service_id int primary key auto_increment,
    service_name varchar(200),
    start_time time,
    end_time time,
    order_condition varchar(500),
    foodType varchar(200),
    fb_page varchar(1000),
    site_link varchar(500),
    phone_num varchar(15),
    isStudent bool,
    description varchar(2000),
    logo varchar(100),
    assigned_by int,
    CONSTRAINT FK_foodServicesw_users FOREIGN KEY (assigned_by)
    REFERENCES users(userid)
);


create table food_s_review(
	r_id int primary key auto_increment,
    quality int,
    pricing int,
    delivery_time int,
    service_id int,
    ratedBy int,
    CONSTRAINT FK_Freview_foodServicesw FOREIGN KEY (service_id)
    REFERENCES foodServices(service_id),
    CONSTRAINT FK_foodReview_users FOREIGN KEY (ratedBy)
    REFERENCES users(userid)
);


create table seat_entry(
	entryid int primary key auto_increment,
    title varchar(1000),
    loc_address varchar(1000),
    seat_count int,
    rent int,
    other_charge int,
    av_from date,
    thumb_img varchar(200),
    lat double,
    lng double,
    phone_no varchar(200),
    entry_by int,
    CONSTRAINT FK_seatentry_users FOREIGN KEY (entry_by)
    REFERENCES users(userid)
);

create table seat_image(
	img_id int primary key auto_increment,
    img_link varchar(200),
    seat_id int,
    CONSTRAINT FK_seatimg_seatentry FOREIGN KEY (seat_id)
    REFERENCES seat_entry(entryid)
);

CREATE TABLE seat_review (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    cleanliness INT,
    comfort INT,
    value_for_money INT,
    seat_id INT,
    reviewed_by INT,
    CONSTRAINT FK_seatreview_seatentry FOREIGN KEY (seat_id)
        REFERENCES seat_entry(entryid),
    CONSTRAINT FK_seatreview_users FOREIGN KEY (reviewed_by)
        REFERENCES users(userid)
);

insert into users
(username, job, university_id, password,approve)
values
('samia', 'stu', '011221408', 'samia123', true);

insert into users
(username, job, university_id, password,approve)
values
('Nhuda', 'fac', '00011', 'huda123', true);

use unilink;
select * from  users;

use unilink;



insert into users
(username, job, university_id, password,approve)
values
('samia', 'stu', '011221408', 'samia123', true);

