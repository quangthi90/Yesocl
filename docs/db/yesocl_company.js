
/** company indexes **/
db.getCollection("company").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_group indexes **/
db.getCollection("company_group").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company_post_category indexes **/
db.getCollection("company_post_category").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** company records **/
db.getCollection("company").insert({
  "_id": ObjectId("516b9622913db4200a000000"),
  "created": ISODate("2013-04-15T05:54:42.0Z"),
  "description": "&lt;p&gt;\r\n\tfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfdsfds&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/company\/516b9622913db4200a000000\/logo.jpg",
  "name": "IBM",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("516b9398913db43009000001"),
    "$db": "yesocl"
  },
  "posts": [
    
  ],
  "status": true
});
db.getCollection("company").insert({
  "_id": ObjectId("5171f0a9976982140f000015"),
  "created": ISODate("2013-04-20T01:34:33.0Z"),
  "description": "&lt;p&gt;\r\n\tLorem ipsum dolor sit amet, sea eu perpetua constituam, ne pri adipisci invenire. Ei illum feugiat vivendo ius, ne his primis docendi. Sanctus cotidieque usu ea, id soleat vivendum nec, quando intellegebat eos cu.&lt;\/p&gt;\r\n",
  "group": {
    "$ref": "company_group",
    "$id": ObjectId("516b9417913db47809000003"),
    "$db": "yesocl"
  },
  "logo": "data\/catalog\/company\/5171f0a9976982140f000015\/logo.png",
  "name": "Oracle",
  "owner": {
    "$ref": "user",
    "$id": ObjectId("516c9acb976982140f000000"),
    "$db": "yesocl"
  },
  "posts": [
    {
      "_id": ObjectId("5171f0e1976982bc0f00000c"),
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "comments": [
        {
          "_id": ObjectId("5171f3eb976982640e000049"),
          "content": "&lt;p&gt;\r\n\tQui sale summo no, mel mutat nonumes posidonium ne. Ea vidit reque inani quo. Singulis referrentur ut mel, et exerci officiis quaerendum ius.&lt;\/p&gt;\r\n",
          "status": true,
          "created": ISODate("2013-04-20T01:48:27.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("516b9398913db43009000001"),
            "$db": "yesocl"
          }
        },
        {
          "_id": ObjectId("5171f405976982640e00004a"),
          "content": "&lt;p&gt;\r\n\tIn dico accommodare reprehendunt pro. Ipsum appellantur interpretaris ei quo, cu duo vocibus partiendo mediocritatem, usu in option appareat consequat. Alienum legendos interesset ne eum, ad probo propriae duo.&lt;\/p&gt;\r\n",
          "status": true,
          "created": ISODate("2013-04-20T01:48:53.0Z"),
          "user": {
            "$ref": "user",
            "$id": ObjectId("516c9acb976982140f000000"),
            "$db": "yesocl"
          }
        }
      ],
      "content": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea. Vix an illud eruditi voluptua, ne ius modo eirmod insolens. Singulis volutpat voluptatibus pro cu, integre oblique cu quo, dicta recusabo an eam. Id mel movet fabulas ocurreret, quo no diceret propriae conclusionemque, id delectus eleifend eum.&lt;\/p&gt;\r\n",
      "created": ISODate("2013-04-20T01:35:28.0Z"),
      "description": "&lt;p&gt;\r\n\tQui sale summo no, mel mutat nonumes posidonium ne. Ea vidit reque inani quo. Singulis referrentur ut mel, et exerci officiis quaerendum ius&lt;\/p&gt;\r\n",
      "status": true,
      "thumb": "data\/catalog\/company\/5171f0a9976982140f000015\/post\/5171f0e1976982bc0f00000c\/thumb.png",
      "title": "Sample post",
      "user": {
        "$ref": "user",
        "$id": ObjectId("516b9398913db43009000001"),
        "$db": "yesocl"
      }
    },
    {
      "_id": ObjectId("5171f437976982640e00004b"),
      "category": {
        "$ref": "company_post_category",
        "$id": ObjectId("516c9640976982b00c000000"),
        "$db": "yesocl"
      },
      "content": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea. Vix an illud eruditi voluptua, ne ius modo eirmod insolens. Singulis volutpat voluptatibus pro cu, integre oblique cu quo, dicta recusabo an eam. Id mel movet fabulas ocurreret&lt;\/p&gt;\r\n",
      "created": ISODate("2013-04-20T01:49:43.0Z"),
      "description": "&lt;p&gt;\r\n\tMei illum nostro id, vix ea option blandit commune. Mutat essent disputationi pri id, eos te solet nominavi iudicabit. No vel esse graece, zril copiosae te sea.&lt;\/p&gt;\r\n",
      "status": true,
      "thumb": "data\/catalog\/company\/5171f0a9976982140f000015\/post\/5171f437976982640e00004b\/thumb.png",
      "title": "Anoter Sample Post",
      "user": {
        "$ref": "user",
        "$id": ObjectId("516c9acb976982140f000000"),
        "$db": "yesocl"
      }
    }
  ],
  "status": true
});

/** company_group records **/
db.getCollection("company_group").insert({
  "_id": ObjectId("516b9417913db47809000003"),
  "name": "Default",
  "description": "&lt;p&gt;\r\n\tdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsfdffdsfdsf&lt;\/p&gt;\r\n",
  "status": true
});

/** company_post_category records **/
db.getCollection("company_post_category").insert({
  "_id": ObjectId("516c9640976982b00c000000"),
  "name": "Default",
  "order": NumberInt(1),
  "status": true
});
