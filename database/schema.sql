/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18.08.2026 10:00:12                          */
/*==============================================================*/

alter table Ordered_Article
   drop foreign key FK_OA_ARTICLE;

alter table Ordered_Article 
   drop foreign key FK_OA_ORDERING;

drop table if exists Article;

drop table if exists Ordered_Article;

drop table if exists Ordering;

/*==============================================================*/
/* Table: Article                                               */
/*==============================================================*/
create table Article
(
   article_id           int not null auto_increment  comment '',
   name                 varchar(254) not null  comment '',
   picture              varchar(254) not null  comment '',
   price                float not null  comment '',
   primary key (article_id)
);

/*==============================================================*/
/* Table: Ordered_Article                                       */
/*==============================================================*/
create table Ordered_Article
(
   ordered_article_id   int not null auto_increment  comment '',
   ordering_id          int not null  comment '',
   article_id           int not null  comment '',
   status               int not null  comment '',
   primary key (ordered_article_id)
);

/*==============================================================*/
/* Table: Ordering                                              */
/*==============================================================*/
create table Ordering
(
   ordering_id          int not null auto_increment  comment '',
   address              varchar(254) not null  comment '',
   ordering_time        datetime default CURRENT_TIMESTAMP  comment '',
   primary key (ordering_id)
);

alter table Ordered_Article add constraint FK_OA_ARTICLE foreign key (article_id)
      references Article (article_id) on delete cascade on update cascade;

alter table Ordered_Article add constraint FK_OA_ORDERING foreign key (ordering_id)
      references Ordering (ordering_id) on delete cascade on update cascade;

