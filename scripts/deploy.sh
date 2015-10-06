ssh "$deploy_user"@"$deploy_ip" -i `cat $ssh_privat_key` "echo "test; exit"

