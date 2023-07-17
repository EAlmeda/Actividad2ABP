// import { EntityAdapter, EntityState, createEntityAdapter } from '@ngrx/entity';
// import { Action, createReducer, on } from '@ngrx/store';
// import { Employee } from 'src/models/Employee';
// import * as fromActions from '../../actions';

// export interface EmployeeState extends EntityState<Employee> {}

// export const employeeAdapter: EntityAdapter<Employee> =
//   createEntityAdapter<Employee>({
//     selectId: (employee: Employee) => employee.id,
//   });

// export const defaultEmployeeState: EmployeeState = {
//   ids: [],
//   entities: {},
// };

// export const EmployeeInitialState: EmployeeState =
//   EmployeeAdapter.getInitialState(defaultEmployeeState);

// export const EmployeeReducer = createReducer(
//   EmployeeInitialState,
//   on(
//     fromActions.loadEmployeeList,
//     (state): EmployeeState => ({
//       ...state,
//     })
//   ),
//   on(
//     fromActions.saveEmployee,
//     (state, { Employee }): EmployeeState =>
//       EmployeeAdapter.upsertOne(Employee, state)
//   ),
//   on(
//     fromActions.updateEmployee,
//     (state, { Employee }): EmployeeState =>
//       EmployeeAdapter.updateOne(
//         { id: Employee.id, changes: { ...Employee } },
//         state
//       )
//   ),
//   on(
//     fromActions.deleteEmployee,
//     (state, { EmployeeId }): EmployeeState =>
//       EmployeeAdapter.removeOne(EmployeeId, state)
//   )
// );

// export function EmployeeReducer(state: EmployeeState, action: Action) {
//   return EmployeeAdapter(state, action);
// }

// export const selectEmployeeList = (state: EmployeeState): Employee[] =>
//   EmployeeAdapter.getSelectors().selectAll(state) ?? [];
