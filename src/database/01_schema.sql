/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18.08.2026 10:00:12                          */
/* Modified on:     24.10.2026 21:04:32                         */
/*==============================================================*/

drop table if exists article;

drop table if exists ordered_article;

drop table if exists ordering;

/*==============================================================*/
/* Table: article                                               */
/*==============================================================*/
create table article
(
   article_id           int not null auto_increment  comment '',
   name                 varchar(254) not null  comment '',
   picture              varchar(254) not null  comment '',
   price                float not null  comment '',
   primary key (article_id)
);

/*==============================================================*/
/* Table: ordered_article                                       */
/*==============================================================*/
create table ordered_article
(
   ordered_article_id   int not null auto_increment  comment '',
   ordering_id          int not null  comment '',
   article_id           int not null  comment '',
   status               int not null  comment '',
   primary key (ordered_article_id)
);

/*==============================================================*/
/* Table: ordering                                              */
/*==============================================================*/
create table ordering
(
   ordering_id          int not null auto_increment  comment '',
   address              varchar(254) not null  comment '',
   ordering_time        datetime default CURRENT_TIMESTAMP  comment '',
   primary key (ordering_id)
);

alter table ordered_article add constraint FK_OA_ARTICLE foreign key (article_id)
      references article (article_id) on delete cascade on update cascade;

alter table ordered_article add constraint FK_OA_ORDERING foreign key (ordering_id)
      references ordering (ordering_id) on delete cascade on update cascade;

