letters=( a b c d e f g h i j k l m n o p q r s t u v w x y z 1 2 3 4 5 6 7 8 9 0 \# )
for i in "${letters[@]}"
do
    l=$(echo $i | tr '[:lower:]' '[:upper:]')
    convert -background transparent -fill white -font Roboto -size 150x150 -gravity center caption:$l $i.png
done
