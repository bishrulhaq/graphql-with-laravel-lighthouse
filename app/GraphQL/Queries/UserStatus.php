<?php
namespace App\GraphQL\Queries;
use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
class UserStatus
{
    public function resolve($rootValue,array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // fetch a user based on an 'id' argument
        $user = User::find($args['id']);

        // Check if the user exists
        if ($user) {
            return "Hi, " . $user->name . " is here.";
        } else {
            return "User is not available. Bye.";
        }
    }
}
