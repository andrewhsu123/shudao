define({ "api": [
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./doc/main.js",
    "group": "D:\\phpStudy\\www\\blocksteam\\branches\\dev\\Application\\doc\\main.js",
    "groupTitle": "D:\\phpStudy\\www\\blocksteam\\branches\\dev\\Application\\doc\\main.js",
    "name": ""
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlGame/index_select",
    "title": "",
    "name": "index_select",
    "group": "搜索接口",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "String",
            "optional": false,
            "field": "game_name",
            "description": "<p>游戏名称</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页数</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "list_rows",
            "description": "<p>每页条数</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"游戏编号\",\n    \"game_name\": 游戏名称,\n    \"online_people\": \"在玩人数\",\n    \"features\": \"一句话简介\"\n    \"game_appid\": \"game_appid\"\n    \"game_address\": \"游戏地址\"\n    \"game_score\": \"游戏评分\"\n    \"icon\": \"游戏图片\"\n   }",
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
    "filename": "./App/Controller/HtmlGameController.class.php",
    "groupTitle": "搜索接口"
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlPresell/index",
    "title": "",
    "name": "index",
    "group": "新游预售",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页数</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "list_rows",
            "description": "<p>每页条数</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"项目编号\",\n    \"title\": 标题,\n    \"eth_money\": \"目标金额\",\n    \"buy_money\": \"每次购买金额\"\n    \"go_money\": \"已购买金额\"\n    \"buy_num\": \"购买人数\"\n    \"rate\": \"进度\"\n    \"online_time\": \"上线时间\"\n    \"end_time\": \"众筹结束时间\"\n    \"cover\": \"主图\"\n   }",
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
    "filename": "./App/Controller/HtmlPresellController.class.php",
    "groupTitle": "新游预售"
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlGame/detail",
    "title": "",
    "name": "detail",
    "group": "详情页接口",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "id",
            "description": "<p>游戏编号</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"游戏编号\",\n    \"game_name\": 游戏名称,\n    \"game_appid\": \"game_appid\",\n    \"game_appid\": \"game_pay_appid\",\n    \"online_people\": \"在玩人数\",\n    \"features\": \"一句话简介\"\n    \"game_address\": \"游戏地址\"\n    \"login_adv_address\": \"登录通知地址\"\n    \"pay_adv_address\": \"支付通知地址\"\n    \"online_time\": \"上线时间\"\n    \"game_score\": \"游戏评分\"\n    \"icon\": \"游戏图片\"\n    \"screenshot\": \"游戏截图\"\n    \"introduction\": \"详细介绍\"\n    \"cover\": \"热门大图\"\n   }",
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
    "filename": "./App/Controller/HtmlGameController.class.php",
    "groupTitle": "详情页接口"
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlPresell/buy_project",
    "title": "",
    "name": "buy_project",
    "group": "购买众筹项目",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "id",
            "description": "<p>项目编号</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "uid",
            "description": "<p>用户编号</p>"
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
            "description": "<p>购买成功</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"成功\"\n   }",
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
          "content": "HTTP/1.1 400 数据错误\n{\n  \"失败\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./App/Controller/HtmlPresellController.class.php",
    "groupTitle": "购买众筹项目"
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlPresell/detail",
    "title": "",
    "name": "detail",
    "group": "项目详情页",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "id",
            "description": "<p>项目编号</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"项目编号\",\n    \"title\": 标题,\n    \"eth_money\": \"目标金额\",\n    \"buy_money\": \"每次购买金额\"\n    \"go_money\": \"已经购买金额\"\n    \"buy_num\": \"购买人数\"\n    \"rate\": \"进度\"\n    \"online_time\": \"上线时间\"\n    \"end_time\": \"众筹结束时间\"\n    \"cover\": \"主图\"\n   }",
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
    "filename": "./App/Controller/HtmlPresellController.class.php",
    "groupTitle": "项目详情页"
  },
  {
    "type": "get",
    "url": "http://192.168.0.122/blocksteam/branches/dev/app.php/HtmlGame/index",
    "title": "",
    "name": "index",
    "group": "首页接口",
    "parameter": {
      "fields": {
        "params": [
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "is_hot",
            "description": "<p>热门列表</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "is_ranking",
            "description": "<p>排行列表</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "is_new",
            "description": "<p>最新列表</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "is_first",
            "description": "<p>首发列表</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页数</p>"
          },
          {
            "group": "params",
            "type": "int",
            "optional": false,
            "field": "list_rows",
            "description": "<p>每页条数</p>"
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
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": \"游戏编号\",\n    \"game_name\": 游戏名称,\n    \"online_people\": \"在玩人数\",\n    \"features\": \"一句话简介\"\n    \"game_appid\": \"game_appid\"\n    \"game_address\": \"游戏地址\"\n    \"game_score\": \"游戏评分\"\n    \"icon\": \"游戏图片\"\n   }",
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
    "filename": "./App/Controller/HtmlGameController.class.php",
    "groupTitle": "首页接口"
  }
] });
