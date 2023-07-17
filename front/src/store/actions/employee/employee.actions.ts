import { createAction, props } from '@ngrx/store';
import { Employee } from 'src/models/Employee';

export const loadEmployeeList = createAction('[Employee] Load employee list');
export const deleteEmployee = createAction(
  '[Employee] Delete employee',
  props<{ employeeId: string }>()
);
export const updateEmployee = createAction(
  '[Employee] Update Employee',
  props<{ employee: Employee }>()
); //TODO: change to type
export const saveEmployee = createAction(
  '[Employee] Save employee',
  props<{ employee: Employee }>()
); //TODO: change to type
