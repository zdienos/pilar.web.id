DATABASENAME="keuangan"
#NEWDB="db_atisisbada_2018"
FILENAME=$DATABASENAME
DATABASEUSER="root"
DBPASSWORD="12345"

mysqldump -u $DATABASEUSER -p$DBPASSWORD --complete-insert --no-create-db --no-create-info --skip-events --skip-routines --skip-triggers $DATABASENAME > $DATABASENAME.data.sql
mysqldump -u $DATABASEUSER -p$DBPASSWORD -f --no-data --skip-events --skip-routines --skip-triggers $DATABASENAME > $DATABASENAME.struk.sql
mysqldump -u $DATABASEUSER -p$DBPASSWORD -f --routines --triggers --no-create-info --no-data --no-create-db --skip-opt  $DATABASENAME > $DATABASENAME.func.sql

#sed -i "s/$DATABASENAME/$NEWDB/g" $DATABASENAME.struk.sql
#sed -i "s/$DATABASENAME/$NEWDB/g" $DATABASENAME.func.sql
#sed -i "s/$DATABASENAME/$NEWDB/g" $DATABASENAME.data.sql


