define({ "api": [
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/area/index",
    "title": "",
    "name": "index",
    "group": "地区列表",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"地区编号\",\n    \"name\": \"地区名称\",\n    \"pcity\": \"下级地区\",\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Area.php",
    "groupTitle": "地区列表"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/film_time/index",
    "title": "",
    "name": "index",
    "group": "场次列表",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符[目前默认123456]</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "film_id",
            "description": "<p>电影编号</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "cinema_id",
            "description": "<p>影院编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "   HTTP/1.1 200 OK\n     {\n        \"code\": \"200\",\n\t\t   \"msg\": \"场次列表\",\n\t\t   \"data\": {\n\t\t   \n\t\t\t\t\"filmList\": [  -- 电影列表\n\t\t\t\t{\n\t\t\t\t\t\"id\": 1, 电影编号\n\t\t\t\t\t\"name\": \"电影名称\",\n\t\t\t\t\t\"introduction\": \"简介\",\n\t\t\t\t\t\"img\": \"电影主图\",\n\t\t\t\t\t\"score\": 排序,\n\t\t\t\t\t\"movie_type\": \"120分钟  剧情、悬疑\",\n\t\t\t\t\t\"actor\": \"主演\",\n\t\t\t\t\t\"video_type\": \"2D,3D,IMAX,MX4D\"\n\t\t\t\t},\n\t\t\t    \"timeList\": [  -- 场次列表\n\t\t\t      \t{\n\t\t\t\t        \"time_fmt\": \"09月30日\", -- 场次时间\n\t\t\t\t        \"time_week\": \"周日\",    -- 场次时间\n\t\t\t\t        \"lists\": [\n\t\t\t\t\t\t\t{\n\t\t\t\t\t\t\t\t\"id\": 1,\t       \t\t\t  -- 场次编号\n\t\t\t\t\t\t\t\t\"h\": 10,           \t\t\t  -- 场次小时\n\t\t\t\t\t\t\t\t\"i\": 0,            \t\t\t  -- 场次分钟\n\t\t\t\t\t\t\t\t\"price\": \"33.00\",  \t\t\t  -- 该场次价格\n\t\t\t\t\t\t\t\t\"hall_id\": 1,      \t\t\t  -- 影厅编号\n\t\t\t\t\t\t\t\t\"type\": \"3D英语\",     \t\t  -- 电影类型\n\t\t\t\t\t\t\t\t\"hall_name\": \"1号厅\"  \t\t  -- 影厅名称\n\t\t\t\t\t\t\t}\n\t\t\t\t\t}\n\t\t    \t],\n\t\t    \t\"address\": {\n\t\t\t\t\t\"id\": 1,   -- 地址编号\n\t\t\t\t\t\"name\": \"影院名称\",\n\t\t\t\t\t\"address\": \"影院地址\",\n\t\t\t\t\t\"area_id\": 所属地区编号,\n\t\t\t\t\t\"phone\": \"17759462410\",\n\t\t\t\t\t\"sort\": 0\n\t\t\t\t}\n\t\t  \t}\n     }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"msg\": 错误信息,\n  \"code\": 错误编号\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/FilmTime.php",
    "groupTitle": "场次列表"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/film/index",
    "title": "",
    "name": "index",
    "group": "影片详情",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符[目前默认123456]</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "id",
            "description": "<p>影片编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "   HTTP/1.1 200 OK\n     {\n        \"code\": \"200\",\n\t\t\t   \"msg\": \"影片详情\",\n\t\t\t   \"data\": {\n\t\t\t    \"id\": 1,\n\t\t\t    \"name\": \"影片名称\",\n\t\t\t    \"img\":  \"影片图片\",\n\t\t\t    \"score\":  \"评分\",\n\t\t\t    \"is_see\":  \"1:看过\",\n\t\t\t    \"is_like\":  \"1:想看\", \n\t\t\t    \"release_time\": \"上映时间\",\n\t\t\t    \"video_type\": \"2D,3D,IMAX,MX4D,中国巨幕\",\n\t\t\t    \"movie_type\": \"120分钟  犯罪、剧情、冒险\",\n\t\t\t    \"detail\": \"简介详细\",\n\t\t\t    \"actor\": [\n\t\t\t      {\n\t\t\t        \"id\": \"演员编号\",\n\t\t\t        \"name\": \"演员名称\",\n\t\t\t        \"job\": \"饰演/角色\",\n\t\t\t        \"img\": \"演员图片\"\n\t\t\t      }\n\t\t\t    ],\n\t\t\t    \"still\": [\n\t\t\t      {\n\t\t\t        \"img\": \"剧照图片\"\n\t\t\t      },\n\t\t\t      {\n\t\t\t        \"img\": \"gw.alicdn.com\\/tfscom\\/TB2uy8tbMHqK1RjSZJnXXbNLpXa_!!6000000004180-0-tbvideo.jpg_q30.jpg\"\n\t\t\t      }\n\t\t\t    ]\n\t\t\t  }\n      }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"msg\": 错误信息,\n  \"code\": 错误编号\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Film.php",
    "groupTitle": "影片详情"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/cinema/index",
    "title": "",
    "name": "index",
    "group": "影院列表",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符[目前默认123456]</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "area_id",
            "description": "<p>地区编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"影院编号\",\n    \"name\": \"影院名称\",\n    \"address\": \"影院地址\",\n    \"phone\": \"手机号\",\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"msg\": 错误信息,\n  \"code\": 错误编号\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Cinema.php",
    "groupTitle": "影院列表"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/film/like",
    "title": "",
    "name": "like",
    "group": "想看/喜欢_操作",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符[目前默认123456]</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "id",
            "description": "<p>影片编号</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "type",
            "description": "<p>1:是否想看  2:是否看过</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "   HTTP/1.1 200 OK\n     {\n        \"code\": \"200\",\n\t\t\t   \"msg\": \"喜欢\",\n\t\t\t   \"data\": {\n\t\t\t\t    \"is_see\":  \"是否看过 1:是 0:否\",\n\t\t\t\t    \"is_like\": \"是否想看 1:是 0:否\",\n\t\t\t\t}\n      }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"msg\": 错误信息,\n  \"code\": 错误编号\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Film.php",
    "groupTitle": "想看/喜欢_操作"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/area/setArea",
    "title": "",
    "name": "setArea",
    "group": "设置地区",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"msg\": \"返回消息\",\n    \"code\": \"错误编码\",\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Area.php",
    "groupTitle": "设置地区"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/cinema/setCinema",
    "title": "",
    "name": "setCinema",
    "group": "设置影院",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "cinema_id",
            "description": "<p>影院编号</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"msg\": \"返回消息\",\n    \"code\": \"错误编码\",\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"error\": err\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Cinema.php",
    "groupTitle": "设置影院"
  },
  {
    "type": "get",
    "url": "http://shudaoo.com/v1/index/index",
    "title": "",
    "name": "index",
    "group": "首页",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "sting",
            "optional": false,
            "field": "token",
            "description": "<p>用户唯一标识符[目前默认123456]</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "cinema_id",
            "description": "<p>影院编号</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>当前页数</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "pagesize",
            "description": "<p>每页记录数</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>200</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "msg",
            "description": "<p>接口访问成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Array",
            "optional": false,
            "field": "data",
            "description": "<p>[]</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"banner\": \"---轮播图---\",\n    \"name\": \"图片名称\",\n    \"url\": \"跳转链接\",\n    \"name\": \"图片地址\",\n    \"hotFilm\": \"---正在热播---\",\n    \"id\": \"影片编号\",\n    \"name\": \"影片名称\",\n    \"introduction\": \"影片一句话简介\",\n    \"img\": \"影片图片\",\n    \"score\": \"影片评分\",\n    \"showFilm\": \"---即将上映---\",\n    \"id\": \"影片编号\",\n    \"name\": \"影片名称\",\n    \"see_num\": \"想看人数\",\n    \"filmList\": \"---全部影片---\",\n    \"movie_type\": \"120分钟  犯罪、剧情、冒险\",\n    \"actor\": \"主演\",\n    \"video_type\": \"2D,3D,IMAX,MX4D,中国巨幕\",\n   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 404": [
          {
            "group": "Error 404",
            "optional": false,
            "field": "404",
            "description": "<p>数据错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 数据错误\n{\n  \"msg\": 错误信息,\n  \"code\": 错误编号\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./v1/controller/Index.php",
    "groupTitle": "首页"
  }
] });
