#!/bin/bash

dir=$(dirname ${0})
install_dir=$PWD

read -p "Plugin name (sample-app): " name
if ! [[ $name =~ ^([a-z]+|[0-9]+|\-)+[a-z]$ ]]
then
  echo "Enter a valid name";
  exit 1;
fi

read -p "Plugin description: " plugin_description
read -p "Author name: " author_name
read -p "Author URI: " author_uri

if [[ -z $author_name ]]
then
  author_name=""
fi
if [[ -z $plugin_description ]]
then 
  plugin_description=""
fi
if [[ -z $author_uri ]]
then
  author_uri=""
fi

printf "\nCreating plugin template: \e[1m%s\e[0m\n\n" "$name"

# TMP_NAME
# TMPNAME
# tmp_name
# TmpName
# tmp-name 
# tmp_name_author
# tmp_name_author_uri
# tmp_name_description
nameUnderscore() 
{
  name_underscore=$(sed "s/\-/\_/g" <<< "$name")
}

nameCamelCase() 
{
  local IFS="-"
  read -a split <<< $name
  for i in ${split[@]}
  do
    allButFirst=${i#?}
    first=${i%${allButFirst}}
    name_camelcase+=${first^^}${allButFirst}
  done
}

nameUpperFirst()
{
  local IFS="-" 
  read -a split <<< $name
  for (( i=0; i < ${#split[@]}; i++ ))
  do
    n=${split[$i]}
    allButFirst=${n#?}
    first=${n%${allButFirst}}
    partOfName=${first^^}${allButFirst}
    if [[ $i > 0 ]]
    then 
      name_upper_first+=" $partOfName"
    else 
      name_upper_first+="$partOfName"
    fi
  done
}

nameUpperCase() 
{
 name_uppercase=$(sed "s/\-/""/g" <<< ${name^^})
}

nameUnderscore 
nameCamelCase 
nameUpperCase
nameUpperFirst

shopt -s globstar
shopt -s dotglob
printf -v library "%s\n" ${dir}/src/**
shopt -u globstar
shopt -u dotglob

src="$dir/src"
for i in $library
do
  v_dir=${i/$src/$install_dir}
  mkd="${v_dir/TmpName/$name_camelcase}"
  if [[ -d $i && "${install_dir}/" != $mkd ]] 
  then
    mkdir $mkd
    printf "%-25s%s\n" "Created directory:" "$mkd"
  elif [[ -f $i ]]
  then
    sed -e "s,tmp_name_author_uri,$author_uri,g"\
      -e "s/tmp_name_author/$author_name/g"\
      -e "s/tmp_name_description/$plugin_description/g"\
      -e "s/tmp_name/$name_underscore/g"\
      -e "s/TmpName/$name_camelcase/g"\
      -e "s/tmp\-name/$name/g"\
      -e "s/TMPNAME/$name_uppercase/g"\
      -e "s/TMP_NAME/$name_upper_first/g" $i > "${mkd}"
    printf "%-25s%s\n" "Created file:" "$mkd"
  fi
done

printf '\n\e[1;37;46m%s\e[m\n' "$name_upper_first created!"

