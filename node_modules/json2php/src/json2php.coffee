json2php = (obj) ->
  switch Object.prototype.toString.call(obj)
    when '[object Null]'      then result = 'null'
    when '[object Undefined]' then result = 'null'
    when '[object String]'    then result = "'" + obj.replace(///\\///g, '\\\\').replace(///\'///g, "\\'") + "'" 
    when '[object Number]'    then result = obj.toString()
    when '[object Array]'     then result = 'array(' + obj.map(json2php).join(', ') + ')'
    when '[object Object]'
      result = []
      for i of obj
        result.push json2php(i) + " => " + json2php(obj[i])  if obj.hasOwnProperty(i)
      result = "array(" + result.join(", ") + ")"
    else
      result = 'null'
  
  result

if typeof module isnt 'undefined' and module.exports
  module.exports = json2php
  # Not that good but usefull
  global.json2php = json2php 

