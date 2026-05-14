    840▕                 $query,
    841▕                 $this->prepareBindings($bindings),
  SQLSTATE[HY000] [1045] Access denied for user 'root'@'fd12:159b:fd32:1:2000:8f:49ff:f894' (using password: NO) (Connection: mysql, Host: mysql.railway.internal, Port: 3306, Database: railway, SQL: select exists (select 1 from information_schema.tables where table_schema = schema() and table_name = 'migrations' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED')) as `exists`)
    842▕                 $e,
      +42 vendor frames 
      Illuminate\Foundation\Application::handleCommand()
Running migrations and seeding database ...
[2026-05-14 07:10:45] production.ERROR: SQLSTATE[HY000] [1045] Access denied for user 'root'@'fd12:159b:fd32:1:2000:8f:49ff:f894' (using password: NO) (Connection: mysql, Host: mysql.railway.internal, Port: 3306, Database: railway, SQL: select exists (select 1 from information_schema.tables where table_schema = schema() and table_name = 'migrations' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED')) as `exists`) {"exception":"[object] (Illuminate\\Database\\QueryException(code: 1045): SQLSTATE[HY000] [1045] Access denied for user 'root'@'fd12:159b:fd32:1:2000:8f:49ff:f894' (using password: NO) (Connection: mysql, Host: mysql.railway.internal, Port: 3306, Database: railway, SQL: select exists (select 1 from information_schema.tables where table_schema = schema() and table_name = 'migrations' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED')) as `exists`) at /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php:838)
[stacktrace]
#0 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(999): Illuminate\\Database\\Connection->runQueryCallback()
#1 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(978): Illuminate\\Database\\Connection->tryAgainIfCausedByLostConnection()
#2 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(796): Illuminate\\Database\\Connection->handleQueryException()
#3 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(411): Illuminate\\Database\\Connection->run()
#4 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(357): Illuminate\\Database\\Connection->select()
#5 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(374): Illuminate\\Database\\Connection->selectOne()
#6 /app/vendor/laravel/framework/src/Illuminate/Database/Schema/Builder.php(176): Illuminate\\Database\\Connection->scalar()
#7 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/DatabaseMigrationRepository.php(185): Illuminate\\Database\\Schema\\Builder->hasTable()
#8 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/Migrator.php(758): Illuminate\\Database\\Migrations\\DatabaseMigrationRepository->repositoryExists()
#9 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(164): Illuminate\\Database\\Migrations\\Migrator->repositoryExists()
#10 /app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(328): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->Illuminate\\Database\\Console\\Migrations\\{closure}()
#21 /app/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call()
#17 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->handle()
#18 /app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()
#12 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(140): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->repositoryExists()
#13 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(110): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->prepareDatabase()
#14 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/Migrator.php(671): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->Illuminate\\Database\\Console\\Migrations\\{closure}()
#11 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(164): retry()
#15 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(109): Illuminate\\Database\\Migrations\\Migrator->usingConnection()
#16 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(88): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->runMigrations()
#19 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()
#20 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()
[stacktrace]
#0 /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/Connector.php(66): PDO->__construct()
#1 /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/Connector.php(85): Illuminate\\Database\\Connectors\\Connector->createPdoConnection()
#23 /app/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute()
#24 /app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()
#26 /app/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand()
#25 /app/vendor/symfony/console/Application.php(1117): Illuminate\\Console\\Command->run()
#27 /app/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun()
#28 /app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run()
#29 /app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle()
#30 /app/artisan(11): Illuminate\\Foundation\\Application->handleCommand()
#31 {main}
#22 /app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()
[previous exception] [object] (PDOException(code: 1045): SQLSTATE[HY000] [1045] Access denied for user 'root'@'fd12:159b:fd32:1:2000:8f:49ff:f894' (using password: NO) at /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/Connector.php:66)
#10 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(827): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}()
#11 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(999): Illuminate\\Database\\Connection->runQueryCallback()
#12 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(978): Illuminate\\Database\\Connection->tryAgainIfCausedByLostConnection()
#13 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(796): Illuminate\\Database\\Connection->handleQueryException()
#5 [internal function]: Illuminate\\Database\\Connectors\\ConnectionFactory->Illuminate\\Database\\Connectors\\{closure}()
#6 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(1257): call_user_func()
#7 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(1295): Illuminate\\Database\\Connection->getPdo()
#8 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(525): Illuminate\\Database\\Connection->getReadPdo()
#9 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(420): Illuminate\\Database\\Connection->getPdoForSelect()
#2 /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/Connector.php(48): Illuminate\\Database\\Connectors\\Connector->tryAgainIfCausedByLostConnection()
#3 /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/MySqlConnector.php(24): Illuminate\\Database\\Connectors\\Connector->createConnection()
#4 /app/vendor/laravel/framework/src/Illuminate/Database/Connectors/ConnectionFactory.php(186): Illuminate\\Database\\Connectors\\MySqlConnector->connect()
#22 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(164): retry()
#23 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(140): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->repositoryExists()
#24 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(110): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->prepareDatabase()
#18 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/DatabaseMigrationRepository.php(185): Illuminate\\Database\\Schema\\Builder->hasTable()
#14 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(411): Illuminate\\Database\\Connection->run()
#19 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/Migrator.php(758): Illuminate\\Database\\Migrations\\DatabaseMigrationRepository->repositoryExists()
#15 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(357): Illuminate\\Database\\Connection->select()
#20 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(164): Illuminate\\Database\\Migrations\\Migrator->repositoryExists()
#21 /app/vendor/laravel/framework/src/Illuminate/Support/helpers.php(328): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->Illuminate\\Database\\Console\\Migrations\\{closure}()
#16 /app/vendor/laravel/framework/src/Illuminate/Database/Connection.php(374): Illuminate\\Database\\Connection->selectOne()
#17 /app/vendor/laravel/framework/src/Illuminate/Database/Schema/Builder.php(176): Illuminate\\Database\\Connection->scalar()
#34 /app/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute()
#35 /app/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()
#36 /app/vendor/symfony/console/Application.php(1117): Illuminate\\Console\\Command->run()
#27 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(88): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->runMigrations()
#28 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->handle()
#29 /app/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()
#30 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()
#31 /app/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()
#32 /app/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call()
#33 /app/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()
#25 /app/vendor/laravel/framework/src/Illuminate/Database/Migrations/Migrator.php(671): Illuminate\\Database\\Console\\Migrations\\MigrateCommand->Illuminate\\Database\\Console\\Migrations\\{closure}()
#26 /app/vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/MigrateCommand.php(109): Illuminate\\Database\\Migrations\\Migrator->usingConnection()
    834▕             $exceptionType = $this->isUniqueConstraintError($e)
    835▕                 ? UniqueConstraintViolationException::class
    836▕                 : QueryException::class;
    837▕ 
  ➜ 838▕             throw new $exceptionType(
   Illuminate\Database\QueryException 
  SQLSTATE[HY000] [1045] Access denied for user 'root'@'fd12:159b:fd32:1:2000:8f:49ff:f894' (using password: NO) (Connection: mysql, Host: mysql.railway.internal, Port: 3306, Database: railway, SQL: select exists (select 1 from information_schema.tables where table_schema = schema() and table_name = 'migrations' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED')) as `exists`)
  at vendor/laravel/framework/src/Illuminate/Database/Connection.php:838
#37 /app/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand()
#38 /app/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun()
#39 /app/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run()
#40 /app/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle()
#41 /app/artisan(11): Illuminate\\Foundation\\Application->handleCommand()
#42 {main}
"} 
      Illuminate\Foundation\Application::handleCommand()
Running migrations and seeding database ...
@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
{{-- Stats Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 rounded-xl">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Products</p>
        <p class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 rounded-xl">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Orders</p>
        <p class="text-3xl font-bold text-gray-900">{{ $totalOrders }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-50 rounded-xl">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Revenue</p>
        <p class="text-3xl font-bold text-gray-900">${{ number_format($totalRevenue, 2) }}</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-yellow-50 rounded-xl">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Pending Orders</p>
        <p class="text-3xl font-bold text-gray-900">{{ $pendingOrders }}</p>
    </div>
</div>

{{-- Latest Orders --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">Latest Orders</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">View All →</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($latestOrders as $order)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-6 text-sm text-gray-700">{{ $order->customer_name }}</td>
                        <td class="py-4 px-6 text-sm font-semibold text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-4 px-6">
                            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full {{ $order->status_badge }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-500">No orders yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
