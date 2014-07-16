function serve ()
{
   sudo dos2unix /vagrant/scripts/serve.sh;
   sudo bash /vagrant/scripts/serve.sh $1 $2
}